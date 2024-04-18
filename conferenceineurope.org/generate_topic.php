<?php
include('script.php');
 $topic_link= mysqli_query($link,"SELECT * FROM `event_topic`  ORDER BY `topic` ASC");

	while($topic_data=mysqli_fetch_array($topic_link))
	{
	extract($topic_data);
	$exact_con=trim($topic);
	$topic_name=sp_replace_hi($topic);
	
	$topic_name = strtolower(sp_replace_hi($topic));
				



echo $page_name=$topic_name.".php";

echo "<br><hr>";

copy("engineering.php","".$page_name);

 $fname = "".$page_name;
$fhandle = fopen($fname,"r");
$content = fread($fhandle,filesize($fname));

$content = str_replace("Engineering", $exact_con, $content);

$fhandle = fopen($fname,"w");
fwrite($fhandle,$content);
fclose($fhandle);
}
?>
