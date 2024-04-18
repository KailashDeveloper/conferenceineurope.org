<?php
include("dbconn_new.php");
$chat_id=$_REQUEST['chat_id'];
$status=$_REQUEST['status'];
mysqli_query($link,"UPDATE `chat_user` SET `status` = '$status' WHERE `id` =$chat_id;");
?>
