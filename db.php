<?php
$con = new mysqli("localhost:3307" , "root" , "mpsamy9233@A" ,"management");

if(!$con){
    die("connection failed!").$con->mysqli_error();
}



?>