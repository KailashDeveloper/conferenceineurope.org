<?php

include('mysqli_dbconn.php');

    $ev_id=$_REQUEST['prom_id'];

	

	//echo "DELETE FROM `promote` WHERE `event_id` = '$ev_id'";

	mysqli_query($link,"DELETE FROM `promote` WHERE `event_id` = '$ev_id'");

	echo "<script>alert('Event Promotion Removed successfully');</script>";

	echo "$ev_id - Removed";





	

?>