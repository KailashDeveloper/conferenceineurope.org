<?php
session_start();
include("mysqli_dbconn.php");
include("fun.php");
$date=date("Y-m-d");

$event_id=$_REQUEST['event_id'];

$event_name=str_xss($_POST['event_name']);
$evt_topic=$_POST['event_topic'];
$event_type=str_xss($_POST['event_type']);
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$org_society=str_xss($_POST['org_society']);
$ev_contact_p=str_xss($_POST['contact_person_event']);
$ev_enq_email=str_xss($_POST['event_enq_email']);
$ev_url=http_str_xss($_POST['web_url']);
$ev_start_date_f=$_POST['event_stat'];
$ev_end_date_f=$_POST['event_end'];
$dead_abst=$_POST['abstract_deadline'];
$ev_desc=str_xss($_POST['short_desc']);
$status="Accept";
$keyword=$_REQUEST['keywords'];


/*function url_vall($url)
	{
		if (filter_var($url, FILTER_VALIDATE_URL)) {
		return 1;
		} else {
		return 0;
		}
	}


function chk_duplicate($ev_url,$ev_start_date_f)
{
global $link;
$query_pag_data = "SELECT * FROM `event` WHERE `web_url` = '$ev_url' and `event_stat` = '$ev_start_date_f'";
$result_pag_data = mysqli_query($link,$query_pag_data) or die('MySql Error' . mysqli_error());
$dup=mysqli_num_rows($result_pag_data);
return($dup);
}*/



$org_id='1';
$ev_url =trim($ev_url);

 $sql_add_ev="INSERT INTO `event` ( `org_id`,`event_topic`, `event_type`, `event_name`, `country`, `state`, `city`, `org_society`, `contact_person_event`, `event_enq_email`, `web_url`, `event_stat`, `event_end`, `abstract_deadline`, `short_desc`,`keywords`, `date_post`, `status`)
 VALUES ( '$org_id','$evt_topic', '$event_type', '$event_name', '$country', '$state', '$city', '$org_society', '$ev_contact_p', '$ev_enq_email', '$ev_url', '$ev_start_date_f', '$ev_end_date_f', '$dead_abst', '$ev_desc','$keyword','$date', '$status');";
 

 mysqli_query($link,$sql_add_ev);
 $cur_ev_id = mysqli_insert_id($link);

 echo "IMPORTED";
 mysqli_close($link);

?>




