<?php
// start session
session_start();
// connect to database;
include("connection.php");
$error= null;
$password = null;
$errors = null;
$email = null;
//Check user inputs
    //define variables
$missingEmail ='<p><strong>Please enter your email address!</strong></p>';
$invalidEmail ='<p><strong>Invalid Email!</strong></p>';
$missingPassword ='<p><strong>Please enter a password!</strong></p>';
$invalidPassword ='<p><strong>sorry wrong password</strong></p>';
//Get email and password
if(empty($_POST["loginEmail"])){
    $errors .= $missingEmail;
}else{
    $email = filter_var($_POST["loginEmail"],FILTER_SANITIZE_EMAIL);
  }
if(empty($_POST["loginPassword"])){
    $errors .= $missingPassword;
}else{
$password = filter_var($_POST["loginPassword"],FILTER_SANITIZE_STRING);
}
// if any errors
if($error){
    $resultMessage = "<div class='alert alert-danger'>" . $error . "</div>";
    echo $resultMessage;
}else{
    //no errors
    // prepare variables for queries
    $email = mysqli_real_escape_string($link,$email);
    $password = mysqli_real_escape_string($link,$password);
    $password = hash('sha256',$password);
}
// run query i.e check the combination of provided password and email
$sql = "SELECT * FROM users WHERE (email = '$email' AND password='$password' AND activation = 'activated')";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);
if($count !== 1){
    echo '<div class ="alert alert-danger">Wrong username or password</div>';
}
else{
    //log in user and set sessions variables
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //start session for the user
    $_SESSION['user_id']=$row['user_id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['email']=$row['email'];
    //if remeber me is not checked
    if(empty($_POST['rememberMe'])){
        echo "success";
    }else{
        
    }
}


    ?>