<?php 
session_start();
include('connection.php');
// check if email or activation key is missing 
if(!isset($_GET['email']) || !isset($_GET['key'])){
    echo '<div class="alert alert-danger"> There was an error. Please click on the acrivation link again</div>';
    exit;
}
//Store them in a variables
$email = $_GET['email'];
$key = $_GET['key'];
// Prepare them for sql queries
$email = mysqli_real_escape_string($link,$email);
$key = mysqli_real_escape_string($link,$key);
//Run query for the matching email and key and set activated 
$sql = "UPDATE users SET activation='activated' WHERE (email = '$email' AND activation ='$key') LIMIT 1";
$result = mysqli_query($link,$sql);
// if queery is  successful show success message and invite the user to the login page
if(mysqli_affected_rows($link) == 1){
    //success message
    echo '<div class="alert alert-success"> Your account has been activated</div>';
    echo '<a href="index.php" type="button" class="btn-lg btn-success>Log in </a>"';
}else{
    echo '<div class="alert alert-danger"> There was an error while activating your account</div>';
}
?>