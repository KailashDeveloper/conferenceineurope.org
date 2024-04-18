<?php

include('script.php');

$cont_link= mysqli_query($link,"SELECT * FROM `place`  ORDER BY `pleace_name` ASC");



while($coun_data=mysqli_fetch_array($cont_link))	

{

$exact_con=$coun_data['pleace_name'];

$place_name=strtolower(sp_replace_hi($coun_data['pleace_name']));

$place_name = strtolower(sp_replace_hi($place_name));

echo $page_name=$place_name.".php";



echo "<br><hr>";



copy("beijing.php","".$page_name);



 $fname = "".$page_name;

$fhandle = fopen($fname,"r");

$content = fread($fhandle,filesize($fname));



$content = str_replace("Beijing", $exact_con, $content);



$fhandle = fopen($fname,"w");

fwrite($fhandle,$content);

fclose($fhandle);

}

?>

