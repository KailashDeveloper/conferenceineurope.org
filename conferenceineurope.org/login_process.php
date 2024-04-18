<?php
session_start();
include("mysqli_dbconn.php");
include("fun.php");
$user_id=sql_inj($_REQUEST['user_id']);
$pass=sql_inj($_REQUEST['log_pass']);



$sql_val=mysqli_query($link,"SELECT * FROM `user_login` WHERE `user_id`='$user_id' and `password`='$pass'");

 $val_to=mysqli_num_rows($sql_val);

	if($val_to>1)
	{
	$sql_val=mysqli_query($link,"SELECT * FROM `user_login` WHERE `user_id`='$user_id'&& `password`='$pass' && `user_type`='ORGANIZER' ");
	}
	
	$lg_data=mysqli_fetch_array($sql_val);
	


	if($lg_data['user_type']=='ORGANIZER')
		{	
				$_SESSION['LOGIN_TYPE']='ORGANIZER';		
				$_SESSION['LOGIN_USER']=$user_id;
				echo "<script>success_login('organizer.php'); </script>";
		}
	
	

else
	{
	echo "<font color='red'><script>error_login();</script></font>"; 
	}	
?>