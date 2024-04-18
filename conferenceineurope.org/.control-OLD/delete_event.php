<?php

include('mysqli_dbconn.php');

$event_id_li=$_REQUEST['content1'];

for($i=0;$i<sizeof($event_id_li);$i++)

	{

	$event_id=$event_id_li[$i];

	mysqli_query($link,"DELETE FROM `event` WHERE `event_id` = $event_id");

	

	echo "<script> location.reload();</script> ";

	}

?>