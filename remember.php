<?php
//check if the user is not logged in and has a remember me cookie in the computer
$authentificator2 = null ;

if(!isset($_SESSION['user_id']) && !empty($_COOKIE['rememberme'])){
    // f1 : COOKIE : $a . "," . bin2hex($b);
    //f2 : hash('sha256',$a)
    //Extract variables from the cookie
    list($authentificator1,$authentificator2) = explode(',',$_COOKIE['rememberme']);
    $authentificator2= hex2bin($authentificator2);
    $f2authentificator2 = hash('sha256',$authentificator2);
    // Look for authentificator 1 in table
    $sql = "SELECT * FROM rememberme where authentificator1 = '$authentificator1'";
    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "error in running the query, not able to find authentificator 1 in table remmeberme";
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count !== 1 ){
        echo "remember me process failed";
    exit;
    }
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //if authentificator1 does not match 
    if(!hash_equals($row['f2authentificator2'],$f2authentificator2)){
        echo "hash_equals returned false";
        echo "<br>" . $f2authentificator2;
        echo "<br>" . $row['f2authentificator2'];
        
    }
    else{
        // generate new authentificators
        //Store them in a cookie
        // This is the same code from login.php file
         
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
        $_SESSION['user_id'] = $row['user_id'];
           header("location:mainpageloggedin.php");
        
    }
    }}
    
   
    

?>