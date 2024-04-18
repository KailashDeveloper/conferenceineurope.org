<?php
session_start();
include("mysqli_dbconn.php");
include("fun.php");
$date=date("Y-m-d");


$org_mail=$_SESSION['LOGIN_USER'];
$mail_header=file_get_contents("mail_header.php");
$mail_footer=file_get_contents("mail_footer.php");


$event_name=str_xss($_POST['event_name']);
$evt_topic=$_POST['evt_topic'];

$event_type=str_xss($_POST['event_type']);

$country=str_xss($_POST['country']);

$state=str_xss($_POST['state']);

$city=str_xss($_POST['city']);

$org_society=str_xss($_POST['org_society']);

$ev_contact_p=str_xss($_POST['ev_contact_p']);

$ev_enq_email=str_xss($_POST['ev_enq_email']);

$ev_url=str_xss($_POST['ev_url']);

$ev_start_date=date('Y-m-d', strtotime($_POST['ev_start_date']));

$ev_end_date=date('Y-m-d', strtotime($_POST['ev_end_date']));

$dead_abst=date('Y-m-d', strtotime($_POST['dead_abst']));

$ev_desc=str_xss($_POST['ev_desc']);

$status="New";

$keyword=implode("#",$chk_topic);

$keyword = addslashes($keyword );
$org_id=$_REQUEST['org_id'];







$sql_add_ev="INSERT INTO `event` ( `org_id`,`event_topic`, `event_type`, `event_name`, `country`, `state`, `city`, `org_society`, `contact_person_event`, `event_enq_email`, `web_url`, `event_stat`, `event_end`, `abstract_deadline`, `short_desc`,`keywords`, `date_post`, `status`)

 VALUES ( '$org_id','$evt_topic', '$event_type', '$event_name', '$country', '$state', '$city', '$org_society', '$ev_contact_p', '$ev_enq_email', '$ev_url', '$ev_start_date', '$ev_end_date', '$dead_abst', '$ev_desc','$keyword','$date', '$status');";

 

 

 mysqli_query($link,$sql_add_ev);

 

 

 $cur_ev_id = mysqli_insert_id($link);

 

$_SESSION['cart']=array();





 $sql_mail=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `mail` WHERE `id`='3'"));

		 	$mail_to=$_SESSION['LOGIN_USER'];

			$mail_from=$sql_mail['mail_from'];

			$mail_sub=$sql_mail['subject'];	

			$msg_m=$sql_mail['msg'];

			

			$message = <<<EOF

$mail_header

<strong>Account Id</strong> : $org_mail<br>

<hr>

<strong>Event Id</strong> : $cur_ev_id<br>

<strong>Event Name</strong> : $event_name<br>

<strong>Enquiry Mail Id</strong> : $ev_enq_email<br>

<strong>Admin Message</strong> : $msg_m <br><br>

<hr>





$mail_footer

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















echo "<script>alert('Event Added Successfully');</script>";

echo "<script>document.getElementById('add_event').reset(); </script>";





?>