<?php
//connect to database
$link = mysqli_connect("localhost","root","","notesapp");
if(mysqli_error($link)){
    die("ERROR : Unable to connect to the database");
}
?>