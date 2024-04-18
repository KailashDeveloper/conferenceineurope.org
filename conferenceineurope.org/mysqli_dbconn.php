<?php
$host="localhost";

/*$user="confnet_db";
$pass="Aladin@#123";
$dbname="confnet_db";
*/
$user="conferenceineuro_db";
$pass="Aladin@#4753";
$dbname="conferenceineuro_db";




function dbconn()
{
 global $link,$host,$user,$pass,$dbname;
 $link=mysqli_connect($host,$user,$pass,$dbname) ;
// mysql_select_db($dbname,$link);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
}
dbconn();
?>