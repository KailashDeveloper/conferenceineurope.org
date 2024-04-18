<?php

include("mysqli_dbconn.php");

include("fun.php");

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









}



echo "<script> alert('Status Updated Successfully');</script>";



?>