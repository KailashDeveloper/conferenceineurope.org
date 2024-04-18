<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set("Asia/Bangkok");


$host="101.53.150.13";
$user="zebraren_calertsin_db";
$pass="Dakhinaray#@!~in";
$dbname="zebraren_calertsin_db";

global $link2,$host,$user,$pass,$dbname;
$link2=mysqli_connect($host,$user,$pass,$dbname) ;
?>