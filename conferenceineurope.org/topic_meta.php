<?php
$cnt_sql="SELECT * FROM `event` WHERE `keywords` like '%$topic%' or `event_topic` like '%###$topic###%'    and `status`='Accept' and `event_stat` > curdate() ";

$total_result=mysqli_num_rows(mysqli_query($link,$cnt_sql));
?>

<title>Top <?php echo $total_result; ?> <?php echo $topic; ?> in <?php  echo date("Y"); ?>/<?php echo date("Y")+1; ?>: Conference in Europe</title>
<meta name="description" content="Conference alerts for upcoming <?php echo $total_result; ?> international <?php echo $topic; ?> conferences in <?php  echo date("Y"); ?>/<?php echo date("Y")+1; ?>. Subscribe to Conference in Europe & get free conference alerts for academic conferences in Europe."/>

<meta name="keywords" content="conference alerts, conference alert, conference alerts <?php  echo date("Y"); ?>, conference alerts <?php  echo date("Y"); ?>/<?php echo date("Y")+1; ?>, conference alert <?php  echo date("Y"); ?>, <?php echo $topic; ?> conferences, International conferences, Academic conferences, <?php echo $topic; ?> conference alerts, conference alerts <?php echo $topic; ?>, latest conference alerts, upcoming conferences"/>
<meta name="robot" content="index,follow"/>
<meta name="author" content="conferencealert.com"/>
<meta name="copyright" content="conferencealert.com"/>
<meta name="content-language" content="EN"/>
<meta name="distribution" content="GLOBAL"/>
<meta name="revisit-after" content="1 days"/>
<meta name="refresh" content="3"/>
<?php
include('month_calc.php');
?>


