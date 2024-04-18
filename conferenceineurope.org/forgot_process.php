<?php
session_start();
include("mysqli_dbconn.php");
include("fun.php");

$mail_header=file_get_contents("mail_header.php");
$mail_footer=file_get_contents("mail_footer.php");
$date=date("Y-m-d");

$org_mail=str_xss($_POST['org_mail']);
$user_type="ORGANIZER";		 

	//$v1= user_val($org_mail);

	

	

	$v1=login_user_val($org_mail,$user_type);

	

	

	if($v1==1)

			{

			echo "<script>alert('Email Id Not Found');</script>";

			echo "<script>$('#org_mail_mail_err').html('This is not a registered Mail Id');</script>";

			echo "<script>document.forgot.org_mail.focus();</script>";

			}

	

	if($v1==0)

{

		$sql_org =mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `user_login` WHERE `user_id`='$org_mail' and `user_type`='$user_type' ")); 		      	$org_pass=$sql_org['password'];



 $sql_mail=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `mail` WHERE `id`='7'"));

		 	$mail_to=$org_mail;

			$mail_from=$sql_mail['mail_from'];

			$mail_sub=$sql_mail['subject'];	

			$msg_m=$sql_mail['msg'];

		

		

		$message = <<<EOF

$mail_header

<hr>

<br>

<strong>User ID </strong>- $org_mail <br>



<strong>Your Password</strong> - $org_pass 

<hr>



$mail_footer

EOF;

		

		

		

		

		

			



   //end of message 		

			

				

		   

		  	  	$headers = "From: All Conference Alerts <$mail_from>:\r\n";

			$headers .= "Reply-To: ". strip_tags($mail_from) . "\r\n";

			$headers .= "MIME-Version: 1.0\r\n";

			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



		   $ok = mail($mail_to,$mail_sub, $message, $headers);

			

			

			if ($ok)

			 { 

			 //echo "<p>mail sent to $mail_to!</p>"; 

			 }

			  else

			  { 

			 // echo "<p>mail could not be sent!</p>"; 

			  }















/*echo "<script>document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';</script>";

echo "<script>document.getElementById('subscribe').reset(); </script>";*/



echo "<script>document.getElementById('forgot').reset(); </script>";

echo "<script>alert('Password reset successfull , Please chek your email');</script>";



}



?>