<?php
ob_start();
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("mysqli_dbconn.php");
include("fun.php");



$date=date("Y-m-d");















$event_name=str_xss($_POST['event_name']);







 $evt_topic=$_POST['evt_topic'];







$event_type=str_xss($_POST['event_type']);



$country=str_xss($_POST['country']);



$state=str_xss($_POST['state']);



$city=str_xss($_POST['city']);



$org_society=str_xss($_POST['org_society']);



$ev_contact_p=str_xss($_POST['ev_contact_p']);



$ev_enq_email=str_xss($_POST['ev_enq_email']);



$ev_url=http_str_xss($_POST['ev_url']);



$ev_start_date=date('Y-m-d', strtotime($_POST['ev_start_date']));



$ev_end_date=date('Y-m-d', strtotime($_POST['ev_end_date']));



$dead_abst=date('Y-m-d', strtotime($_POST['dead_abst']));



$ev_desc=str_xss($_POST['ev_desc']);







$keyword="";



 /*while (list($key, $val) = each($_SESSION['cart']))  
 		 {	
		$keyword = $keyword.$val ."#"	;
		 }*/

$ev_id=$_REQUEST['ev_id'];

$sql_add_ev="UPDATE `event` SET `event_topic` = '1###2###Business Ethics1',



																	`event_topic`='$evt_topic',



																	`event_type` = '$event_type', 



																	`event_name` = '$event_name',



																	`country` = '$country',



																	`state` = '$state', 



																	`city` = '$city', 



																	`org_society` = '$org_society',



																	`contact_person_event` = '$ev_contact_p',



																	`event_enq_email` = '$ev_enq_email',



																	`web_url` = '$ev_url',



																	`event_stat` = '$ev_start_date',



																	`event_end` = '$ev_end_date',



																	`abstract_deadline` = '$dead_abst',



																	`short_desc` = '$ev_desc'







																	WHERE `event_id` = '$ev_id';";



																	



 



 mysqli_query($link,$sql_add_ev);



$_SESSION['cart']=array();











/* $sql_mail=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `mail` WHERE `id`='3'"));



		 	$mail_to=$_SESSION['ORGINIZER'];



			$mail_from=$sql_mail['mail_from'];



			$mail_sub=$sql_mail['subject'];	



			$msg_m=$sql_mail['msg'];



			



			$message = <<<EOF



<table width='80%' height='337' border='0' align='center' cellpadding='1' cellspacing='0' style='border:1px solid #00465E;border-radius:5px;'>



  <tr>



    <td height='49'>&nbsp;</td>



    <td colspan='4'><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mail_logo/mail_logo.png" alt='<?php echo $_SERVER['HTTP_HOST']; ?>'></td>



  </tr>



  <tr>



    <td width='4%' height='49'>&nbsp;</td>



    <td colspan='4'> 



    <strong style='font-weight:normal; font-family:Verdana, Arial, Helvetica, sans-serif;color:#666666 ;font-size:12px; font-weight:normal; padding:10px;'><br />



$msg_m<br />



<br />



</strong></td>



  </tr>



  



  <tr>



    <td height='21'>&nbsp;</td>



    <td colspan='3'>&nbsp;</td>



    <td>&nbsp;</td>



  </tr>



  



  <tr>



    <td height='21'>&nbsp;</td>



    <td width="22%" align='right'><strong style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#666666;'>Email address /User Id:</strong></td>



    <td width="2%" align='center'><strong>:</strong></td>



    <td colspan='2'><strong style='font-family:Tahoma, sans-serif, Modern; font-size:12px; color:#006699;'>$mail_to</strong></td>



  </tr>



  



  <tr>



    <td height='21'>&nbsp;</td>



    <td align='right'>&nbsp;</td>



    <td align='center'>&nbsp;</td>



    <td colspan='2'>&nbsp;</td>



  </tr>



  <tr>



    <td height='21'>&nbsp;</td>



    <td align='right'><strong style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#666666;'>Event Name</strong></td>



    <td align='center'><strong>:</strong></td>



    <td colspan='2'><strong style='font-family:Tahoma, sans-serif, Modern; font-size:12px; color:#006699;'>$event_name</strong></td>



  </tr>



  



  <tr>



    <td height='21'>&nbsp;</td>



    <td align='right'><strong style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#666666;'>Enquiry Mail Id </strong></td>



    <td align='center'><strong>:</strong></td>



    <td colspan='2'><strong style='font-family:Tahoma, sans-serif, Modern; font-size:12px; color:#006699;'>$ev_enq_email</strong></td>



  </tr>



  



  <tr>



    <td height='19'>&nbsp;</td>



    <td colspan='3'><p><br />



    </p></td>



    <td width='5%'>&nbsp;</td>



  </tr>



</table>



<br />



  <br />



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



			



			



			if ($ok)



			 { 



			 //echo "<p>mail sent to $mail_to!</p>"; 



			 }



			  else



			  { 



			 // echo "<p>mail could not be sent!</p>"; 



			  }*/































/*echo "<script>document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';</script>";*/



echo  "<script>alert('Event Edited Successfully');</script>";



//echo  "<script>document.location.href='organiser.php';</script>";











?>



<?php



mysqli_close($link);



?>