<div class="inr-left-sec">
    <h3>Popular Topics</h3>
    <?php
    include('right_topic_accordian.php');; ?>
    <!--<h3>Popular Country</h3>-->
    <?php  //include('right_country_accordian.php') ;
    ?>
    <?php
    if ($pp == "event_detail.php") {
        $limit = "limit 0,3";
    } else {
        $limit = "";
    }
    ?>
    <div class="left-promtion-link promtion-image">
        <ul>
            <?php
            $sql_ad = mysqli_query($link, "SELECT * FROM `ad_image` WHERE `ad_type`='Left' ORDER BY `id`   ASC  $limit");
            while ($sql_p = mysqli_fetch_array($sql_ad)) {
            ?>
                <li><a href="<?php echo $sql_p['url']; ?>" target="_blank">
                        <img src="<?php echo $base_url; ?>ad/<?php echo $sql_p['image']; ?>" class="img-responsive"></a>
                </li>
            <?php }
            ?>
        </ul>
    </div>

    <?php // include('global_promote.php') ;
    ?>
</div>
<div class="inr-left-sec">
    <?php
    $sql_reg = "SELECT DISTINCT `region` from `country` where `region` ='Europe'  ORDER BY `region`  ASC ";
    $reg_link = mysqli_query($link, $sql_reg);
    while ($reg_data = mysqli_fetch_array($reg_link)) {
    ?>
        <h3> <?php echo $region = $reg_data['region']; ?></h3>
        <?php
        include('country_promote.php');
        ?>
    <?php } ?>
</div>