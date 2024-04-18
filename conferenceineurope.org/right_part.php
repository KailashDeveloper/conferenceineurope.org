<div class="inr-left-sec">
<h3>Popular Topics</h3>

<?php 

	

	include('right_topic_accordian.php'); 

		

		;?>

<!--<h3>Popular Country</h3>-->



<?php  //include('right_country_accordian.php') ;?>





<?php

if($pp=="conf-detail.php")

{

$limit="limit 0,5";

}

else

{

$limit="";	



}



?>

<div class="left-promtion-link promtion-image">



<ul>

<?php

	if(isset($country)){

		

		$rightPromosql = "SELECT * FROM `ad_image` WHERE `ad_type`='FR_RIGHT' and (`country` = '$country' || `country` = '0') and `expire_date` >= now()  ORDER BY `id`   ASC  $limit"; 

	}else{

		$rightPromosql = "SELECT * FROM `ad_image` WHERE `ad_type`='FR_RIGHT' and `expire_date` >= now()  ORDER BY `id`   ASC  $limit"; 

	}



	

$sql_ad=mysqli_query($link,$rightPromosql);



while($sql_p=mysqli_fetch_array($sql_ad))



{



?>

<li><a href="<?php echo $sql_p['url']; ?>" target="_blank">



<img src="<?php echo $base_url; ?>ad/<?php echo $sql_p['image']; ?>" class="img-responsive" style="padding-bottom:15px; width:100%;"></a></li>



<?php }



?> 

</ul> 



</div>

<?php //include('country_promote.php') ; ?>    



<?php  //include('global_promote.php') ;?>





</div>
<?php

// if(isset($link)){

// mysqli_close($link);

// 	unset($link);

// }

?>





























