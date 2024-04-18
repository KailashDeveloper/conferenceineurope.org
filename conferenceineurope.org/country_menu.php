<div class="row">
    <?php if (isset($country)) {



    ?>

        <h1><?php if (isset($meta_title) and  $meta_title == '111') echo $meta_title;
            else { ?>

                International Conferences in <?php echo $country; ?> <?php echo date("Y"); ?>

            <?php } ?>

        </h1>



        <?php if (isset($page_content) and $meta_title == '111') {
            echo $page_content;
        } else { ?>

            <p>
                Start a new journeying with conferenceineurope for international conferences in <?php echo $country; ?> <?php echo date("Y"); ?>. Search your choice and choose your interest from a wide range of conference topics. Using this site, you can get international conferences on current topics of many subjects such as Science and Technology Conference, Environment Conference, Mathematics Conference, Business Conference, Economics Conference etc. You can also prepare to attend the upcoming conferences in Austria and it will help you to explore the latest research and innovation throughout the world.
            </p>
            <p>
                Don’t miss your likeliness to gain knowledge from latest research and innovation at the <?php echo $country; ?> international conference <?php echo date("Y"); ?>. Register and subscribe conferenceineurope for current and important subject related conferences and get notification about the latest offers and updates.
            </p>

            <br>

            <br>











        <?php } ?>



        <br>

        <br>



        <h5>Major conference cities&nbsp;:</h5>



        <div class="col-md-12">
            <ul class="county-month-confr">

                <?php



                $country_id = country_name_country_id($country);

                $sql_get_state = mysqli_query($link, "SELECT * FROM `place` WHERE `country` ='$country_id' ORDER BY `pleace_name` ASC");

                while ($state_li_data = mysqli_fetch_array($sql_get_state)) {



                    $dycontpage = strtolower(sp_replace_hi($state_li_data['pleace_name'])) . ".php";

                ?>

                    <li><a href="<?php echo $dycontpage; ?>" target="_blank"><?php echo $state_li_data['pleace_name']; ?></a></li>

                <?php

                }

                ?>

            </ul>
        </div>



    <?php

    }



    ?>



    <br>

    <br>



    <?php if (isset($country)) { ?>









        <h5 class="heading-space-5">Confernece Calendar :</h5>


        <div class="col-md-12">
            <ul class="county-month-confr">

                <?php



                $nes_con = trim(strtolower(sp_replace_hi($country)));

                for ($i = 0; $i < sizeof($m_array); $i++) {

                ?>

                    <li class="country"><a href="<?php echo $page_name; ?>?date=<?php echo $m_a[$i]; ?>"><?php echo $m_array[$i]; ?></a></li>



                <?php } ?>



                <li class="country"><a href="<?php echo $page_name; ?>">All Events</a></li>





            </ul>
        </div>





        <br>

        <br>

        <br>

        <br>



        <div class="col-sm-12">
            <h2 class="heading-space">List of Upcoming Conferences in <?php echo $country; ?> </h2>
        </div>



        <br>

        <br>

    <?php

    }

    ?>
</div>