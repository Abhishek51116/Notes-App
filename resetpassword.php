<!DOCTYPE html>
<html>
<head>
</head>
    <body>
<?php 
session_start();
include('connection.php');
// check if user id or key is missing 
if(!isset($_GET['user_id']) || !isset($_GET['key'])){
    echo '<div class="alert alert-danger"> There was an error. Please click on the acrivation link again</div>';
    exit;
}
//Store them in a variables
$user_id = $_GET['user_id'];
$key = $_GET['key'];
$time = time() - 86400;
// Prepare them for sql queries
mysqli_real_escape_string($link,$email);
mysqli_real_escape_string($link,$key);
//Check if the combination of key and user id is correct also check that the key is 24 hours old
//Run query for the matching email and key and set activated 
$sql = "UPDATE users SET activation='activated' WHERE (email = '$email' AND activation ='$key') LIMIT 1";
$result = mysqli_query($link,$sql);
$sql = "SELECT user_id FROM forgotpassword WHERE key ='$key' AND user_id='$user_id' AND time > $time";
$result = mysqli_query($link,$sql);
if(!$result){
    echo '<div class="alert alert-danger"> Error running the query! </div>';
    exit;
}
//if combination does not exist
//show error message
  $count = mysqli_num_rows($result);
    if($count !== 1 ){
        echo "Wrong parameters, Try again";
    exit;
    }
//print form to reset password 
echo "
<form methord="POST" id="passwordreset">
<input type=hidden name=key value=$key>
<input type=hidden name=user_id value=$user_id>
<div>
<label for="password">Password</label>
<input type='password' name='password' id='password' placeholder="Enter NEW password">
</div>
<div>
<input type="submit" name="resetpassword" class="btn btn-success btn-lg" value="Reset Password">
</div>
</form>
<div id="resultMessage">
</div>
";
?>
        <script src="jquery.js"></script>
        <script>
        //once user clicks the login button
$("#passwordreset").submit(function(event){
    //Prevent the php processing
    event.preventDefault();
    //collect data from user
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    //Ajax call
    $.ajax({
        url : "storeresetpassword.php",
        type : "POST",
        data : datatopost,
        success: function(data){
            if(data == "success"){
                window.location = "mainpageloggedin.php"
            }else{
            $("#loginMessage").html(data);
            }
      }
    
    }); 
});
        </script>
    </body>
</html>

