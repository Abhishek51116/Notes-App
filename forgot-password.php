<?php 
// Start session
session_start();
// link to db
include('connection.php');
//check user inputs
    //define error messages
    $missingEmail ='<p><strong>Please enter your email address!</strong></p>';
    $invalidEmail ='<p><strong>Invalid Email!</strong></p>';
//Get email
//store errors in error variables
if(empty($_POST["fogotPasswordEmail"])){
$error .= $missingEmail;
    }else{
    $email = filter_var($_POST["fogotPasswordEmail"],FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error .= $invalidEmail;
    }
}
// if errors are present
if($error){
    $resultMessage = "<div class='alert alert-danger'>" . $error . "</div>";
    echo $resultMessage;
    exit;
}
// prepare variables for queries
$email = mysqli_real_escape_string($link,$email);
//Run query
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
//if email address is not present in the database
$count=mysqli_num_rows($result);
if(!$count){
    echo "<div>No accounts associated with that email</div>";
    exit;
}
// get user id
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$user_id = $row['user_id'];
//Create a unique activation code
$key = bin2hex(openssl_random_pseudo_bytes(16));
//time
$time = time();
$status = 'pending';
//run query
$sql = "INSERT INTO forgotpassword (`ùser_id`,`key`,`time`,`status`) VALUES (`$user_id`,`$key`,`$time`,`$status`)";
//check if query ran successfully
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div>" .mysqli_error($link). "</div>";
    exit;
}
//Snd email containing link
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: abhishekaggarwal173@gmail.com' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
$message = "Please click on the link to change your password";
$message .= "localhost/9/resetpassword.php?user_id=$user_id&key=$key";
if(mail($email,'Reset your password',$message,$headers)){
echo "<div> Go to your mail.</div>";
}




?>