<?php
session_start();
include("mysqli_dbconn.php");
$society_id=$_REQUEST['society_id'];
$domain=strtolower(trim($_REQUEST['domain']));
$society=addslashes($_REQUEST['society']);
$title=addslashes($_REQUEST['title']);
$description=addslashes($_REQUEST['description']);
$image=$_SESSION['ad_image'];

$address=addslashes($_REQUEST['address']);
$youtube=$_REQUEST['youtube'];



if($image=="")
{
$image=$_REQUEST['h_logo'];
}


$sql="UPDATE `org_society` SET `society` = '$society',`domain` = '$domain', `logo` = '$image',`youtube`='$youtube',`title`='$title' ,`description` = '$description' WHERE `society_id` = $society_id;";


mysqli_query($link,$sql);
echo "<script>alert('Successfully Added');</script>";
echo "<script>document.getElementById('add_ad_image').reset(); </script>";
?>