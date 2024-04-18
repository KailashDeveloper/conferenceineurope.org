<?php
session_start();
include("mysqli_dbconn.php");
$heading=trim($_REQUEST['heading']);
$listing_domain=trim($_REQUEST['listing_domain']);

$country=trim($_REQUEST['country']);
$domain=trim($_REQUEST['domain']);



$event_id_list=trim($_REQUEST['event_id_list']);


$post_date=date("Y-m-d");

$status="";
	
	if(isset($_REQUEST['edit_id']))
		{
		$edit_id=$_REQUEST['edit_id'];	
		
		$sql="Update `group_promote` set
		 `heading`= '$heading',
		`listing_domain`='$listing_domain',
		 `domain`='$domain', 
		 `country`= '$country',
		 `event_id_list` ='$event_id_list' 
		 where `group_id` = '$edit_id' ";	
		
		}
		
	else{	
	$sql="INSERT INTO `group_promote` (`heading`,`listing_domain`, `domain`, `country`,`event_id_list`,`post_date`,`status`)
	VALUES ('$heading','$listing_domain', '$domain','$country' ,'$event_id_list','$post_date','$status');";	
	}
	
	 $sql;
	

mysqli_query($link,$sql);

echo "<script>alert('Successfully Added');</script>";

/*echo "<script>document.getElementById('add_ad_group').reset(); </script>";*/



?>