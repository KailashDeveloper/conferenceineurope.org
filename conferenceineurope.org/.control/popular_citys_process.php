<?php
include("mysqli_dbconn.php");
include("fun.php");

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);


$chk_place=$_REQUEST['chk_place'];

mysqli_query($link,"UPDATE `place` SET `popular` = '0';");

while (list($key, $val) = each($chk_place)) 
 {

mysqli_query($link,"UPDATE `place` SET `popular` = '1' WHERE `place_id` = '$val';");
 }


echo  "<script>alert('Updated Successfully');</script>";
?>