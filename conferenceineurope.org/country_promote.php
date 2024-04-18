<?php
$main_cat_acc_sql = "SELECT * FROM `country` WHERE `region` = '$region' ORDER BY `country` ASC";
$main_cat_acc_sql = mysqli_query($link, $main_cat_acc_sql);
while ($main_cat_acc_data = mysqli_fetch_array($main_cat_acc_sql)) {
?>
  <button class="accordion3"><i class="fa fa-desktop"></i> <?php echo  $main_cat_acc_data['country']; ?></button>
  <div class="panel1">
    <ul>
      <?php
      $pm_topic_id_acc = $main_cat_acc_data['id'];
      $topic_right_part = mysqli_query($link, "SELECT pleace_name FROM `place` WHERE `country` = '$pm_topic_id_acc' ORDER BY `pleace_name` ASC");
      while ($right_topic_data = mysqli_fetch_array($topic_right_part)) {
        $exact_con = trim($right_topic_data['pleace_name']);
        $topic_page = sp_replace_hi(strtolower($exact_con));
        $page_name = $topic_page . ".php";
        $dycontpage = $base_url . $page_name;
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
  var acc = document.getElementsByClassName("accordion3");
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