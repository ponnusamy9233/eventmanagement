<?php

session_start();
ob_start();
$con = new mysqli("localhost:3307","root","mpsamy9233@A","management");
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$organization = $_POST['org'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

//php validation part occurs
$check = strlen($firstname);
$org = strlen($organization);
$mail_check = preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/",$email);
$mobil_check = preg_match("/^\d{10}$/",$mobile);
if($firstname==="" || $check <4 && $org <4 || !$mail_check || !$mobil_check){
   $sql ="";
}
else{
$sql = "INSERT INTO registration(firstname,lastname,organization,email,mobile) VALUES('$firstname','$lastname','$organization','$email','$mobile')";

$res = $con->query($sql);
if($res){
  echo '<script>
       $("#alerts").show(400);
      </script>';
  echo "Thank you, for registration you will receive your ticket to your email, For support call 8766677676";
  echo '<script> setTimeout(function () {
    location.reload(true);
  }, 2000);</script>'; 
}
else{
  echo "failed".mysqli_error($res);
}
}



?>