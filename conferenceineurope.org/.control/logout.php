<?php
session_start();
session_destroy();
header("location:https://<?php echo $_SERVER['HTTP_HOST']; ?>/control");
?>