<?php

include('mysqli_dbconn.php');

    $event_id=$_REQUEST['event_id'];

	$promote_type=$_REQUEST['promote_type'];

	$promote_place=$_REQUEST['promote_place'];

    $event_stat=$_REQUEST['event_stat'];

    $date=date("Y-m-d");

				 

		mysqli_query($link,"INSERT INTO `promote` ( `event_id`, `promote_type`, `promote_place`, `promote_by`, `transaction_id`, `date`, `exp_date`) 

			         VALUES ( '$event_id', '$promote_type','$promote_place', 'ADMIN', 'NONE', '$date', '$event_stat');");

	

	echo "<script>alert('event promoted successfully');</script>";

	echo "Promoted";

?>