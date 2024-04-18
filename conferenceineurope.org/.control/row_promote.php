<?php
session_start();
include('mysqli_dbconn.php');

    $event_id=$_REQUEST['event_id'];

	$promote_type=$_REQUEST['promote_type'];

	$promote_place=$_REQUEST['promote_place'];

    $event_stat=$_REQUEST['event_stat'];

    $date=date("Y-m-d");
	
	$status="ACCEPT";
	
	
	if($promote_type=='HOMEFEATURED' )
	{	
	$banner=$_SESSION['ad_image'];
	}
	else 	$banner="";
		

			$sql_prd="INSERT INTO `promote` ( `event_id`, `promote_type`, `promote_place`, `promote_by`, `transaction_id`,`banner`, `date`, `exp_date`) 

			         VALUES ( '$event_id', '$promote_type','$promote_place', 'ADMIN', 'NONE', '$banner','$date', '$event_stat');"	; 

		mysqli_query($link,$sql_prd);

	

	echo "<script>alert('event promoted successfully');</script>";

	echo "Promoted";

?>