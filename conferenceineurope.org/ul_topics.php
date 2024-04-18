<ul><?php
 while($topic_data=mysqli_fetch_array($topic_link))
   {
extract($topic_data);
$exact_con=trim($topic);
$topic_name=strtolower(sp_replace_hi($topic));
$page_name=$topic_name.".php";
?>

<li class='col-md-3'><a href="<?php echo $page_name;?>" ><?php echo $topic; ?></a>
<!--<span style="padding:5px; color:#D8FF00; font-weight:bold;">|</span>-->
</li>

<?php
   }
?>

</ul>