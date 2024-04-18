<?php

include("mysqli_dbconn.php");

include("fun.php");

$ch_id=$_REQUEST['ch_id'];

$email=$_REQUEST['email'];

$replied=$_REQUEST['replied'];











mysqli_query($link,"UPDATE `chat_user` SET `replied` = '$replied' WHERE `id` =$ch_id;");



$sql_mail=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `mail` WHERE `id`='4'"));



		 	$mail_to=$email;

			$mail_from=$sql_mail['mail_from'];

			$mail_sub='CONFERENCEALERTS CHAT';	

			$msg_m=$sql_mail['msg'];

			

			$message = <<<EOF

<table width='100%' border='0' align='center' cellpadding='1' cellspacing='0' style='border:1px solid #00465E;border-radius:10px;'>

  <tr>

    <td width="4%" height='49'>&nbsp;</td>

    <td colspan='2'><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mail_logo/mail_logo.png" alt='<?php echo $_SERVER['HTTP_HOST']; ?>' ></td>

  </tr>

  

  <tr>

    <td height='21'>&nbsp;</td>

    <td colspan="2" align='right'><table width='100%' border='0' align='center' cellpadding='1' cellspacing='0' >

      <tr>

        <td width="18%" height='21' align="right"><strong style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#666666; '>Admin Reply </strong></td>

        <td width="3%" align='center' valign="top"><strong>:</strong></td>

        <td width="74%" valign="top"><strong style='font-family:Tahoma, sans-serif, Modern; font-size:12px; color:#000000;'>$replied</strong></td>

      </tr>

      <tr>

        <td height='19' colspan="3">&nbsp;</td>

        <td>&nbsp;</td>

      </tr>

      <tr>

        <td height='19' colspan="3"><strong style='font-weight:normal; font-family:Verdana, Arial, Helvetica, sans-serif;color:#666666 ;font-size:12px; font-weight:normal; padding:10px;'>$msg_m</strong></td>

        <td width='5%'>&nbsp;</td>

      </tr>

    </table></td>

  </tr>

  

  <tr>

    <td height='19'>&nbsp;</td>

    <td>&nbsp;</td>

    <td width='5%'>&nbsp;</td>

  </tr>

</table>

<br />

<br />

Thank you for using <strong><?php echo $_SERVER['HTTP_HOST']; ?> </strong><br />

Feel Free to Revert Back.<br />

Thank you.<br />

Regards<br />

<strong>Team AllConference Alert</strong><br />

<strong>Mail: alerts@<?php echo $_SERVER['HTTP_HOST']; ?></strong><br />

<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>" style="text-decoration:none; color:#0066FF;"><strong><?php echo $_SERVER['HTTP_HOST']; ?></strong></a>



EOF;

   //end of message 		

			

				

		   

		  	$headers = "From: " . strip_tags($mail_from) . "\r\n";

			$headers .= "Reply-To: ". strip_tags($mail_from) . "\r\n";

			$headers .= "MIME-Version: 1.0\r\n";

			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		





		   $ok = mail($mail_to,$mail_sub, $message, $headers);

	



echo "<script> alert('Status Updated Successfully');</script>";

?>