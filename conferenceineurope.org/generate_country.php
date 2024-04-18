<?php
include('script.php');
$cont_link= mysqli_query($link,"SELECT * FROM `country` ORDER BY `country` ASC ");

while($coun_data=mysqli_fetch_array($cont_link))	
{
$exact_con=$coun_data['country'];
//$country_name=sp_replace_hi($coun_data['country']);

$country_name = strtolower(sp_replace_hi($exact_con));




echo $page_name=$country_name.".php";

echo "<br><hr>";

copy("india.php","".$page_name);

 $fname = "".$page_name;
$fhandle = fopen($fname,"r");
$content = fread($fhandle,filesize($fname));

$content = str_replace("India", $exact_con, $content);

$fhandle = fopen($fname,"w");
fwrite($fhandle,$content);
fclose($fhandle);
}
?>
