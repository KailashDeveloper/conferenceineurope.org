<section class="">
<div class="container">
<div class="conf-title-sec text-center mbt40">
<div class="conf-title">Conference Topics</div>
<!--<div class="conf-subtitle">in Europe</div>-->
</div>
<?php
                            $primaryTopics= mysqli_query($link,"SELECT * FROM `event_cat`  ORDER BY `position` ASC");
							while($pm_data = mysqli_fetch_array($primaryTopics)){
								$pm_id = $pm_data['id'];
								$category = $pm_data['category'];
                          	?>
<div class="conf-title-sec col-md-12 contry-list">
<h3 class=" + topic_heading" data-wow-duration="4s"><?php echo $category; ?></h3>
<?php
$id=1;
$topic_link= mysqli_query($link,"SELECT * FROM `event_topic` WHERE `cat_id` = '$pm_id' ORDER BY `topic` ASC");
include('ul_topics.php');
?> 
	</div>
<?php
}
?>
	</div>
</section>
	 