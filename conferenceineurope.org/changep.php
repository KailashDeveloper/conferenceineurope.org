<?php
session_start();
include("mysqli_dbconn.php");
$old_pass=$_REQUEST['curr_pass'];
$new_pass=$_REQUEST['new_pass'];
$con_pass=$_REQUEST['con_pass'];
$u=$_SESSION['LOGIN_USER'];
if($_SESSION['LOGIN_TYPE'] == 'ORGANIZER')
{
$log_dett=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `user_login` WHERE `user_id` ='$u' and `user_type`='ORGANIZER'"));
$org_pass=$log_dett['password'];

			$exist_pass=$org_pass;
			if($old_pass==$exist_pass)
			{
			mysqli_query($link,"UPDATE `user_login` SET `password` = '$new_pass'  WHERE `user_id` ='$u' and `user_type`='ORGANIZER';");
			echo "<script>alert('Password Chnaged Successfully');</script>";
			echo "<script>$('#pass_val').html('Password Changed Successfully');</script>";
			}
			else
			{
			echo "<script>alert('Invalid Old Password');</script>";
			echo "<script>$('#old_pass_err').html('Invalid Old Password');</script>";
			echo "<script>document.pass_form.curr_pass.focus();</script>";
			}

}



	

?>