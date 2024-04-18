<?php
$host="localhost";
$user="allcoycj_allconf";
$pass="Aladin#123";
$dbname="allcoycj_allconf";


/*$host="localhost";
$user="root";
$pass="";
$dbname="alert"*/;


function dbconn()
{
 global $link,$host,$user,$pass,$dbname;
 $link=mysqli_connect($host,$user,$pass,$dbname) ;

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
}
dbconn();
?>