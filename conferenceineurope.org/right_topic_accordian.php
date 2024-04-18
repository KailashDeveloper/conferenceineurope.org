

<?php
$main_cat_acc_sql = "SELECT * FROM `event_cat` ORDER BY `category` ASC";
$main_cat_acc_sql = mysqli_query($link,$main_cat_acc_sql);
while($main_cat_acc_data = mysqli_fetch_array($main_cat_acc_sql)){
?>

<button class="accordion2"><i class="fa fa-desktop"></i> <?php echo  $main_cat_acc_data['category']; ?></button>
<div class="panel">
  <ul>
		<?php
	 $pm_topic_id_acc = $main_cat_acc_data['id'];
	$topic_right_part= mysqli_query($link,"SELECT * FROM `event_topic` WHERE `cat_id` = '$pm_topic_id_acc' ORDER BY `topic` ASC");
	while($right_topic_data = mysqli_fetch_array($topic_right_part)){

		$exact_con=trim($right_topic_data['topic']);
		$topic_page=sp_replace_hi(strtolower($exact_con));
		$page_name=$topic_page.".php";
			
		//$topic_page = strtolower(sp_replace_hi($topic));
		//$place_page = strtolower(sp_replace_hi($city));
		//$dycontpage = $base_url.$place_page."/".$topic_page."/";
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
var acc = document.getElementsByClassName("accordion2");
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


