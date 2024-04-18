<?php include ("mysqli_dbconn.php"); ?>
<?php include ("fun.php"); ?>


<?php

$email=$_REQUEST['sub_email'];
$name="";
$date=date("Y-m-d");


	$val_code=md5(time());
	
	
	
mysqli_query($link,"INSERT INTO `subscribe` (`name`,`email_id`,`date_post`,`val_code`)
 							 VALUES   ('$name','$email','$date','$val_code');");	

		$paper_id=mysqli_insert_id($link);
	
 		 	$mail_to=$email;
			$mail_from="info@igrnet.org";
			$mail_sub="New Subscription";	
			$msg_m="New Subscription";
			
			$message = <<<EOF

<table width='550' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td align="center" > Conference IN Europe</td>
  </tr>
  <tr>
    <td align="center"><h4 class="style1"><br />
      Thank you ,<br>
      For subscribing at Conferenceineurope.org<br>
      <br>
      <br>
      <br>
      <br>
      <br>
    </h4></td>
  </tr>
  
</table>

EOF;
   //end of message 		
			
				
		   
		  	$headers = "From: " . strip_tags($mail_from) . "\r\n";
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

echo "<script>document.getElementById('subscribe').reset(); </script>";
echo "<script>alert('Subscribed Successfully'); </script>";
echo "Subscribed Successfully";


?>

