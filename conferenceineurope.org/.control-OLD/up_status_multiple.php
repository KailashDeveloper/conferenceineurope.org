<?php
include("mysqli_dbconn.php");
include("fun.php");

$mail_header=file_get_contents("../mail_header.php");
$mail_footer=file_get_contents("../mail_footer.php");



$ev_id_list=$_REQUEST['ev_id_list'];

$status=$_REQUEST['status'];

$reason=$_REQUEST['reason'];





 $t_ev_id_list=explode("#",$ev_id_list);



for($o=1;$o<sizeof($t_ev_id_list);$o++)

	{

	$ext_ev_id= $t_ev_id_list[$o];	 

	mysqli_query($link,"UPDATE `event` SET `status` = '$status', `reason` = '$reason' WHERE `event_id` =$ext_ev_id;");

	 

	 

	 

$sql_curr_ev_detail= mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `event` WHERE `event_id`='$ext_ev_id'"));



$event_id =$ext_ev_id;

$org_id=$sql_curr_ev_detail['org_id'];

$org_mail=org_email($org_id);



$event_category =get_ev_cat($sql_curr_ev_detail['event_type']);

$event_name=$sql_curr_ev_detail['event_name'];

$org_society=$sql_curr_ev_detail['org_society'];









$event_category =get_ev_cat($sql_curr_ev_detail['event_topic']);



$event_type =event_type($sql_curr_ev_detail['event_type']);



$event_topic = event_topic($sql_curr_ev_detail['event_topic']);

$country=event_country($sql_curr_ev_detail['country']);

$city=$sql_curr_ev_detail['city'];

$state= $sql_curr_ev_detail['state'];

$society =$sql_curr_ev_detail['org_society'];

$contact_person =$sql_curr_ev_detail['contact_person_event'];

$event_enq_email =$sql_curr_ev_detail['event_enq_email'];

$website_address =$sql_curr_ev_detail['web_url'];

$event_start = $sql_curr_ev_detail['event_stat'];

$event_end=$sql_curr_ev_detail['event_end'];

$deadline=$sql_curr_ev_detail['abstract_deadline'];

$short =$sql_curr_ev_detail['short_desc'];


$conference_url = "https://www.allconferencealert.com/event-detail.html?ev_id=$ext_ev_id";








if($status=="Accept")

{

$mail_list=2;

}

else $mail_list=6;





$sql_mail=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `mail` WHERE `id`='$mail_list'"));



		 	$mail_to=$org_mail;

			$mail_from=$sql_mail['mail_from'];

			$mail_sub=$sql_mail['subject'];	

			$msg_m=$sql_mail['msg'];

			

			$message = <<<EOF

$mail_header



Organization Society :<strong>$org_society</strong><br>


Event Id :<strong>$event_id</strong><br>

Event Name :<strong>$event_name</strong><br>

Event Category:<strong>$event_category </strong><br>

Event Type:<strong>$event_type</strong><br>

Event Topic :<strong>$event_topic</strong><br>

Country:<strong>$country</strong><br>

City:<strong>$city</strong><br>

State or Province :<strong>$state</strong><br>

Contact person for event:<strong>$contact_person</strong><br>

Event Enquiries email address:<strong>$event_enq_email</strong><br>

Website Address:<strong>$website_address</strong><br>

Event start date:<strong>$event_start</strong><br>

Event end date:<strong>$event_end</strong><br>

Deadline for abstracts/proposals:<strong>$deadline</strong><br>

Short description:<strong>$short</strong><br>

Conference URL:<a hrer='$conference_url'> View Conference Detail </a>

Status :<strong>$status</strong><br>

Message:<strong>$reason</strong><br>
<br>

$msg_m 






 <hr>

$mail_footer

EOF;



   //end of message 		

			

				

		   

		  	$headers = "From: " . strip_tags($mail_from) . "\r\n";

			$headers .= "Reply-To: ". strip_tags($mail_from) . "\r\n";

			$headers .= "MIME-Version: 1.0\r\n";

			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		



if($status!="Hide")

	{

	

		   $ok = mail($mail_to,$mail_sub, $message, $headers);

		   $ok1 = mail($event_enq_email,$mail_sub, $message, $headers);

	}		

		

	 

	 

	 

	 

	}





















echo "<script> alert('Status Updated Successfully');</script>";

?>