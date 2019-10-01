<?php
// start session
session_start();
// connect to database;
include("connection.php");
$error= null;
$password = null;
$errors = null;
$email = null; 
$f2authentificator2 = null;
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
        // create two variables ie authentificator 1 and authentificator 2
        $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10));
        //2^80 
        $authentificator2 = openssl_random_pseudo_bytes(20);
        //store them in a cookie
        function f1($a,$b){
            $c = $a . "," . bin2hex($b) ;
            return $c;
            }
        $cookieValue = f1($authentificator1,$authentificator2);
        setcookie(
        "rememberme",$cookieValue,
            time() + 1296000
        );
        //Run query t(o store them in remember me table
        function f2($a) {
            $b = hash('sha256',$a);
            return $b;
        }   
        $f2authentificator2 = f2($f2authentificator2);
        $user_id = $_SESSION['user_id'];
        $expiration = date('Y-m-d H:i:s', time() + 1296000);
        $sql = "INSERT INTO rememberme
        (`authentificator1`,`f2authentificator2`,`user_id`,`expires`)
        VALUES
        ('$authentificator1','$f2authentificator2','$user_id','$expiration')";
        $result = mysqli_query($link,$sql);
       if(!$result){
       echo "Error running the query, remember me";
       }else{
           echo "success";
       }
        

    }
}


    ?>