
<style>

</style>
<?php
$main_country_acc_sql = "SELECT * FROM `country` where `region` != '' GROUP by `region` ORDER BY `country`.`region` ASC";
$main_country_acc_sql = mysqli_query($link,$main_country_acc_sql);
while($main_country_acc_data = mysqli_fetch_array($main_country_acc_sql)){
	$region = $main_country_acc_data['region'];
?>

<button class="accordion1"><i class="fa fa-desktop"></i> <?php echo  $main_country_acc_data['region']; ?></button>
<div class="panel">
  <ul>
		<?php
	 $pm_country_id_acc = $main_country_acc_data['id'];
	$country_right_part= mysqli_query($link,"SELECT * FROM `country` WHERE `region` = '$region' ORDER BY `country` ASC");
	while($right_country_data = mysqli_fetch_array($country_right_part)){

		$exact_con=trim($right_country_data['country']);
		$country_page=sp_replace_hi(strtolower($exact_con));
		$page_name=$country_page.".php";
			
		//$country_page = strtolower(sp_replace_hi($country));
		//$place_page = strtolower(sp_replace_hi($city));
		//$dycontpage = $base_url.$place_page."/".$country_page."/";
		$dycontpage = $base_url.$page_name;	
		?>
          <li>

           <!-- <i class="fa fa-desktop"></i>-->

            <a formtarget="_blank" href="<?php echo $dycontpage; ?>"> <?php echo $exact_con; ?> </a>

          </li> 

   <?php
	}
		?>         
	
       </ul>   
</div>

<?php
}
	?>


<script>
var acc = document.getElementsByClassName("accordion1");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active_acc");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>


