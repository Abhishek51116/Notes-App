<?php
//<!-- Start a session -->
session_start();
include("connection.php");
$result = null;
$error = null;
$username =null;
$email = null;
$password = null;
$activationKey = null;
$message = null;
$missingUsername ='<p><strong>Please enter a username!</strong></p>';
$missingEmail ='<p><strong>Please enter your email address!</strong></p>';
$invalidEmail ='<p><strong>Invalid Email!</strong></p>';
$missingPassword ='<p><strong>Please enter a password!</strong></p>';
$invalidPassword ='<p><strong>Password should be atleast 6 characters and must include atleast one capital letter and one number! </strong></p>';
$differentPassword ='<p><strong>Passwords do not match!</strong></p>';
$missingPassword2 ='<p><strong>Enter password in second field also!</strong></p>';
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: abhishekaggarwal173@gmail.com' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

//Get User name
if(empty($_POST["username"])){
    $error .= $missingUsername;
    }else{
    $username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
    }
//Get email
if(empty($_POST["email"])){
$error .= $missingEmail;
    }else{
    $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error .= $invalidEmail;
    }
}
// GET PASSWORD
if(empty($_POST["password"])){
    $error .= $missingPassword;
}elseif(!strlen($_POST["password"])>6 and !preg_match('/[A-Z]/',$_POST["password"]) and !preg_match('/[0-9]/',$_POST["password"])){
   $error .= $invalidPassword;
}else{
    $password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
    // second password
    if(empty($_POST["rePassword"])){
        $error .= $missingPassword2;
    }else{
       $password2 = filter_var($_POST["rePassword"],FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $error .= $differentPassword;
        }
    }
}//if any error is present
if($error){
    $resultMessage = "<div class='alert alert-danger'>" . $error . "</div>";
    echo $resultMessage;
}
// no errors
//Preapare variables for the queries
$username = mysqli_real_escape_string($link,$username);
$email = mysqli_real_escape_string($link,$email);
$password = mysqli_real_escape_string($link,$password);
$password = md5($password);//128 bits 
//Check if user is already in the database
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo '<div class="alert alert-danger">'.mysqli_error($link).'</div>';
    exit;
}
$results=mysqli_num_rows($result);
if($results){
    echo "<div>Sorry that username has already been taken!</div>";
    exit;
}
//Check if email is already taken

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
$results=mysqli_num_rows($result);
if($results){
    echo "<div>Sorry that email has already been taken!</div>";
    exit;
}
//create activation code
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
$sql = "INSERT INTO users (`username`,`email`,`password`,`activation`) VALUES ('$username','$email','$password','$activationKey')";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div>" .mysqli_error($link). "</div>";
    exit;
}
 //Send activation key to the user
$message = "Please click on the link to activate your profile";
$message .= "localhost/9/activate.php?email=".urldecode($email)."&key=$activationKey";
if(mail($email,'Confirm your email id',$message,$headers)){
echo "<div> Go to your mail.</div>";
}


?>