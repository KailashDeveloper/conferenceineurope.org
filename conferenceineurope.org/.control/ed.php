<?php

session_start();

include("mysqli_dbconn.php");



$new=md5("aladin");

mysqli_query($link,"UPDATE `admin` SET `password` = '$new'");

echo "<script>alert('Password Chnaged Successfully');</script>";

echo "<script>$('#pass_val').html('Password Changed Successfully');</script>";





?>