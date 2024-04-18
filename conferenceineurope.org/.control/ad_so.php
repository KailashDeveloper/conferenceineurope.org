<?php
session_start();
include("mysqli_dbconn.php");
$domain=strtolower(trim($_REQUEST['domain']));
$society=addslashes($_REQUEST['society']);
$title=addslashes($_REQUEST['title']);
$description=addslashes($_REQUEST['description']);
$image=$_SESSION['ad_image'];


$address=addslashes($_REQUEST['address']);
$youtube=$_REQUEST['youtube'];



$sql="INSERT INTO `org_society` (`domain`,`society`,`title`, `description`, `logo`,`address`,`youtube`) VALUES ('$domain','$society','$title', '$description', '$image','$address','$youtube');";
mysqli_query($link,$sql);
echo "<script>alert('Successfully Updated');</script>";
echo "Successfully Updated";
echo "<script>document.getElementById('add_ad_image').reset(); </script>";

?>