<?php
session_start();
include("mysqli_dbconn.php");
include("fun.php");

$date=date("Y-m-d");
$contact_name=str_xss($_POST['contact_name']);
$orgn_name=str_xss($_POST['orgn_name']);
$org_id=$_REQUEST['org_id'];

/*if($_SESSION['logo']!="")
{
$logo=$_SESSION['logo'];
}
else
{
$logo=$_REQUEST['hid_logo'];
}*/

mysqli_query($link,"UPDATE `org_detail` SET `contact_person_name` = '$contact_name',`orginisation_name` = '$orgn_name' WHERE `org_id` ='$org_id=';");

$_SESSION['logo']="";
echo "<script>alert('Updated  Successfully');</script>";

?>