<?php
session_start();
include("mysqli_dbconn.php");

 $url=$_REQUEST['url'];
 
  
 $meta_title=addslashes(trim($_REQUEST['meta_title']));
 $meta_keywords=addslashes(trim($_REQUEST['meta_keywords']));
 $meta_desc=addslashes(trim($_REQUEST['meta_desc']));
 $page_content=addslashes(trim($_REQUEST['page_content']));

$hidden=$_REQUEST['hidden'];


$query_pag_data = "SELECT * FROM `meta` where `url` = '$url'";
$result_pag_data = mysqli_query($link,$query_pag_data) or die('MySql Error' . mysql_error());

$res_dt=mysqli_fetch_array($result_pag_data);
$chk_exist=mysqli_num_rows($result_pag_data);






if($hidden=='NEW' and $chk_exist ==0)
	{

 $sql_manage="INSERT INTO `meta` (`url`, `meta_title`, `meta_keywords`, `meta_desc` ,`page_content`) 
						 VALUES ('$url', '$meta_title', '$meta_keywords', '$meta_desc','$page_content');";
	 }
	 
if($hidden=='UPDATE' || $chk_exist == '1')	 
	{
	
	$meta_id=$_REQUEST['meta_id'];
	
	if($chk_exist==1)
	{
	$meta_id =$res_dt['meta_id'];
	}
	
	 $sql_manage="UPDATE  `meta` SET `url` = '$url',
									`meta_title` = '$meta_title', 
									`meta_keywords` = '$meta_keywords',
									`meta_desc` = '$meta_desc',
									`page_content`='$page_content'
									WHERE `meta_id` = '$meta_id';";
	}
	
	
	mysqli_query($link,$sql_manage);
	
	echo "<script> alert('Meta Updated Successfully'); </script>";	
?>