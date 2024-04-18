<?php
ob_start();
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('mysqli_dbconn.php');
$event_id =$_REQUEST['event_id'];
$list_id =$_REQUEST['list_id'];

mysqli_query($link,"UPDATE `import_detail` SET `last_import_id` = '$event_id' WHERE `id` = '$list_id';");


echo $event_id . "Updated";




?>