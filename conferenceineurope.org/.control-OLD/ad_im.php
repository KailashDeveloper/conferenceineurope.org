<?php
session_start();
include("mysqli_dbconn.php");
$heading=$_REQUEST['heading'];
$url=$_REQUEST['url'];
$image=$_SESSION['ad_image'];
$ad_type=$_REQUEST['ad_type'];


$post_date=date("Y-m-d");
$expire_date=date('Y-m-d', strtotime($_REQUEST['expire_date']));



if(isset($_REQUEST['country']))
	{
		$country=$_REQUEST['country'];
	$sql="INSERT INTO `ad_image` (`ad_type`,`hed`, `image`, `country`,`url`,`expire_date`,`post_date`)
	 VALUES ('$ad_type','$heading', '$image','$country' ,'$url','$expire_date','$post_date');";
	
	}
else {
$sql="INSERT INTO `ad_image` (`ad_type`,`hed`, `image`, `url` ,`expire_date`,`post_date`) 
VALUES ('$ad_type','$heading', '$image', '$url','$expire_date','$post_date');";
}
mysqli_query($link,$sql);

echo "<script>alert('Successfully Added');</script>";

echo "<script>document.getElementById('add_ad_image').reset(); </script>";

unset ($_SESSION['ad_image']);

?>