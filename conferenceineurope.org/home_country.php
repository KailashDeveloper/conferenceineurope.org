<section class="contry-sec">



    <div class="container">



        <div class="conf-title-sec text-center mbt40">



            <h1>International Academic Conferences in Europe</h1>



            <hr>



            <h2>



                <div class="conf-title" style="padding-bottom:15px;">Upcoming Conference in Europe 2024</div>



            </h2>



            <p style=" width: 100%; margin: 0 auto; text-align:left;text-align:justify;">Find the list of upcoming conferences in Europe through our website. Subscribe today to get future conferences in Europe in your inbox. We offer a diverse range of themes and topics, catering to a variety of interests and professional backgrounds. From innovation and sustainability to diversity and personal well-being, these conferences provide individuals with the opportunity to stay informed, learn from experts, and network with like-minded individuals. <a href="https://www.conferenceineurope.org/about.php" style="color:#297DE1;">view more...</a>



            </p>



            <div class="col-md-12 size-manag-img">



                <?php



                if ($pp == "index.php") {



                    $k = 0;



                    $sql_new_ev = "SELECT * FROM `ad_image` WHERE `ad_type`='Top' and (`country` ='0' || `country` ='' ||`country` IS NULL ) and `expire_date` >= now()   ORDER BY `id`  DESC limit 0,6";



                    $link_new_ev = mysqli_query($link, $sql_new_ev);



                    while ($new_ev_data = mysqli_fetch_array($link_new_ev)) {



                        if ($k == 4) echo "<br>";



                        $k = $k + 1;



                ?>



                        <div class="col-md-4 manage-bor-">



                            <a href="<?php echo $new_ev_data['url']; ?>" target="_blank">



                                <img  src="<?php echo $base_url; ?>ad/<?php echo  $new_ev_data['image']; ?>" alt="Conference in Europe" class="img-responsive" style="height:170px; width:340px;padding-top: 10px;"></a>



                        </div>



                <?php



                    }



                }



                ?>







            </div>



            <div class="conf-title col-md-12" style="padding-bottom:15px;">Featured Events</div>



            <div class="feature-event">



                <?php



                $sql_promote = mysqli_query($link, "SELECT * FROM `promote` join `event` where `promote`.`event_id`=`event`.`event_id` and `promote`.`exp_date`>= curdate()   and `promote_type` like 'HOMEFEATURED' ORDER BY `promote`.`promote_id` DESC limit 0,6");



                while ($p_data = mysqli_fetch_array($sql_promote)) {



                ?>



                    <div class="confer-featur-top col-md-4">



                        <div class="confer-featur">



                            <div class="fetur-prgh">



                                <h5><i class="fa fa-calendar-check-o"></i><?php echo  date('M d Y', strtotime($p_data['event_stat'])); ?></h5>



                                <h3><a href="conf-detail.php?ev_id=<?php echo $p_data['event_id']; ?>&name=<?php echo $p_data['event_name']; ?>" class="black" target="_blank"><?php echo substr($p_data['event_name'], 0, 50); ?> ...</a></h3>



                                <h5><i class="fa fa-location-arrow"></i><?php echo $p_data['city'] . " , " . event_country($p_data['country']); ?></h5>



                            </div>



                            <div class="fetur-logo"><img src="logo_ad/<?php echo $p_data['banner']; ?>"></div>



                        </div>



                    </div>



                <?php



                }



                ?>



            </div>



            <style type="text/css">



                .confer-featur {



                    background: #fff;



                    border: 1px solid #eeecec;



                    width: 100%;



                    float: left;



                    margin: 5px 0px;



                    padding: 15px;



                    border-radius: 8px;



                    box-shadow: 1px 1px 1px #0a0a0a5e;



                    -moz-box-shadow: 1px 1px 1px #0a0a0a5e;



                    -webkit-box-shadow: 1px 1px 1px #0a0a0a5e;



                    text-align: left;



                    height: 160px;



                }







                .feature-event .fetur-prgh {



                    width: 65%;



                    float: left;



                    padding-right: 7px;



                }







                .feature-event .fetur-prgh h5 {



                    color: #333333;



                    font-size: 14px;



                    letter-spacing: 1px;



                    margin: 5px 0px;



                }







                .feature-event .fetur-prgh h5 i {



                    color: #f28c32;



                    font-size: 14px;



                    padding-right: 5px;



                }







                .feature-event .fetur-prgh h3 {



                    line-height: 20px;



                    margin-bottom: 10px;



                }







                .feature-event .fetur-prgh h5 {



                    color: #333333;



                    font-size: 14px;



                    letter-spacing: 1px;



                    margin: 5px 0px;



                }







                .feature-event .fetur-logo {



                    width: 35%;



                    height: 100px;



                    float: right;



                    /* margin-top: 0px; */



                    margin: auto 0px;



                    position: relative;



                }







                .feature-event .fetur-logo img {



                    width: 100%;



                    position: absolute;



                    top: 0;



                    bottom: 0;



                    margin: auto;



                }







                .feature-event .fetur-prgh h3 a {



                    font-size: 12px;



                    font-weight: 700;



                    /* margin-right: 10px; */



                    color: #333;



                }



            </style>



        </div>



    </div>



    <div class="container">



        <div class="white-box ">



            <div class="conf-title-sec text-center mbt40">



                <h3>



                    <div class="conf-title">Conference Countries in Europe</div>



                </h3>



                <!-- <div class="conf-subtitle"></div> -->



            </div>



            <div class="contry-list">



                <?php



                $sql_reg = "SELECT DISTINCT `region` from `country` where `region` ='Europe'  ORDER BY `region`  ASC ";



                $reg_link = mysqli_query($link, $sql_reg);



                while ($reg_data = mysqli_fetch_array($reg_link)) {



                ?>



                    <!-- <h3><?php echo $region = $reg_data['region']; ?></h3> -->



                    <?php



                    $cont_link = mysqli_query($link, "SELECT * FROM `country` WHERE  `region` = '$region' ORDER BY `country` ASC");



                    include("ul_country.php");



                    ?>



                <?php } ?>



            </div>



        </div>



    </div>



</section>



<section class="contry-sec">



    <div class="container">



        <div class="white-box ">



            <div class="conf-title-sec text-center mbt40">



                <h3>



                    <div class="conf-title">Conference Cities in Europe</div>



                </h3>



                <!-- <div class="conf-subtitle"></div> -->



            </div>



            <div class="contry-list">



                <ul>



                    <?php



                    $sql_place = "SELECT * FROM `place` JOIN `country` ON `place`.`country` = `country`.`id` AND `country`.`region`= 'EUROPE'  ";



                    $place_link = mysqli_query($link, $sql_place);



                    while ($place_data = mysqli_fetch_array($place_link)) {



                    ?>



                        <?php



                        extract($place_data);



                        $fl_name = $dycontpage = sp_replace_hi($pleace_name);



                        $dycontpage = strtolower(sp_replace_hi($pleace_name)) . ".php";



                        ?>



                        <li><a href="<?php echo $dycontpage; ?>" class="confrence">



                                <span itemprop="areaServed"><?php echo $pleace_name; ?></span></a></li>



                    <?php } ?>



                </ul>



            </div>



        </div>



    </div>



</section>