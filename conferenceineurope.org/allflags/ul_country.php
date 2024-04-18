<ul>
<?php
 while($country_data=mysqli_fetch_array($cont_link))
   {
extract($country_data);
$fl_name=$dycontpage = sp_replace_hi($country);
$dycontpage = strtolower(sp_replace_hi($country)).".php";
?>

<li><a href="<?php echo $dycontpage; ?>"  title="Conference in <?php echo $country; ?>" class="confrence">
<img src="allflags/<?php echo $fl_name; ?>.png" alt=""  height="20"/>
<span itemprop="areaServed"><?php echo $country; ?></span></a></li>
	
<?php
   }
?>
</ul>
