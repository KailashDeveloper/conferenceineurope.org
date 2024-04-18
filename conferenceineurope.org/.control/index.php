<?php

ob_start();

session_start();

error_reporting(E_ALL);

ini_set('display_errors', 1);







include("mysqli_dbconn.php");

if(isset($_REQUEST['user_id']))

	{

	$user_id=$_REQUEST['user_id'];

	echo $pass=md5($_REQUEST['pass']);

	$x=mysqli_num_rows(mysqli_query($link,"SELECT * FROM `admin` WHERE `user_id`='$user_id' && `password`='$pass'"));

	if($x>0)

		{

		$_SESSION['ALERT_ADMIN']="ADMIN";

        $_SESSION['chat_user']='SUPPORT';

		header("location:home.php");

		}

		else

	 	{

		$error="Error In User Id Or Password";

		}

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Admin Pannel</title>

<link rel="stylesheet" href="css/login.css" type="text/css" />



</head>

<body id="login-bg"> 

 

<!-- Start: login-holder -->

<div id="login-holder">



	<!-- start logo -->

	<div id="logo-login" align="center" style="padding-left:150px;">

		<center><a href="index.html"><img src="images/logo.png" alt=""/></a></center>	</div>

<!-- end logo -->

	

	<div class="clear"></div>

	

	<!--  start loginbox ................................................................................. -->

	<div id="loginbox">

	

	<!--  start login-inner -->

	<div id="login-inner">

	<form action="" method="post" name="admin" >

		<table border="0" cellpadding="0" cellspacing="0">

		<tr>

			<th>Username</th>

			<td><input name="user_id" type="text"  class="login-inp" id="user_id" value="" /></td>

		</tr>

		<tr>

			<th>Password</th>

			<td><input name="pass" type="password"  class="login-inp" id="pass" value="" /></td>

		</tr>

		<tr>

			<th></th>

			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>

		</tr>

		<tr>

			<th></th>

			<td><input type="submit" class="submit-login"  /></td>

		</tr>

		</table>

	  </form>

	</div>

 	<!--  end login-inner -->

	<div class="clear"></div>

	<div id="load"></div>

	<a href="" class="forgot-pwd">Forgot Password ?</a>

 </div>

 <!--  end loginbox -->

 

	<!--  start forgotbox ................................................................................... -->

	<div id="forgotbox">

		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>

		<!--  start forgot-inner -->

		<div id="forgot-inner">

		<table border="0" cellpadding="0" cellspacing="0">

		<tr>

			<th>Email address:</th>

			<td><input type="text" value=""   class="login-inp" /></td>

		</tr>

		<tr>

			<th> </th>

			<td><input type="button" class="submit-login"  /></td>

		</tr>

		</table>

		</div>

		<!--  end forgot-inner -->

		<div class="clear"></div>

		<a href="" class="back-login">Back to login</a>

	</div>

	<!--  end forgotbox -->



</div>

<!-- End: login-holder -->

</body>

</html>