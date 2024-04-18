<?php
ob_start();
session_start();
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
$status="Pending";


$chk_topic=$_REQUEST['chk_topic'];



$keyword="";

 while (list($key, $val) = each($chk_topic)) 
		 {
		 $keyword = $keyword.$val ."#"	;
		 }

$org_id=$_REQUEST['org_id'];
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
																	`short_desc` = '$ev_desc', 
																	`keywords` = '$keyword',
																	`status` = '$status' 
																	WHERE `event_id` = '$ev_id';";

																	

 

 mysqli_query($link,$sql_add_ev);
 


echo  "<script>alert('Event Edited Successfully');</script>";


?>

<?php

mysqli_close($link);

?>