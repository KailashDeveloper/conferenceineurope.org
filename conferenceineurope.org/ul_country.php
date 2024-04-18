<ul>
<?php
	$listcountry = [];
 while($country_data=mysqli_fetch_array($cont_link))
   {
extract($country_data);
$listcountry[] = "'".$id."#".$country."'";
$fl_name=$dycontpage = sp_replace_hi($country);
$dycontpage = strtolower(sp_replace_hi($country)).".php";
?>

<li class="col-md-3"><a href="<?php echo $dycontpage; ?>"  title="Conference in <?php echo $country; ?>" class="confrence">
<!--
<img src="allflags/<?php echo $fl_name; ?>.png" alt="Flag of <?php echo $country; ?>"  height="20"/>
-->
<strong>>> </strong><span itemprop="areaServed"><?php echo $country; ?></span></a></li>
	
<?php } ?>
</ul>
