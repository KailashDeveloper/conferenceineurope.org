<?php

session_start();

include("mysqli_dbconn.php");

$old_pass=$_REQUEST['curr_pass'];

$new_pass=$_REQUEST['new_pass'];

$con_pass=$_REQUEST['con_pass'];

$u=$_SESSION['ALERT_ADMIN'];



$det=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `admin`"));

 $exist_pass=$det['password'];



if(md5($old_pass)==$exist_pass)

{

$new=md5($new_pass);

mysqli_query($link,"UPDATE `admin` SET `password` = '$new'");

echo "<script>alert('Password Chnaged Successfully');</script>";

echo "<script>$('#pass_val').html('Password Changed Successfully');</script>";

}

else

{

echo "<script>alert('Invalid Old Password');</script>";

echo "<script>$('#old_pass_err').html('Invalid Old Password');</script>";

echo "<script>document.pass_form.curr_pass.focus();</script>";

}



?>