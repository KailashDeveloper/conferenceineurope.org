<div class="container">

    <div class="inr-body-content">

        <div class="row">





            <div class="col-md-8 pull-left">

                <div class="inr-right-sec">



                    <div class="inr-up-cmng-evnt-box mbt40 page_hed">





                        <?php include('cont-place-menu.php'); ?>



                        <div id="loading_events">



                            <?php include('country_load_pagi_data.php'); ?>



                        </div>



                    </div>













                </div>

            </div>
            <div class="col-md-4 pull-right">

                <?php

                include('right_part.php');

                ?>

            </div>

        </div>

    </div>

    <style>
        .link a:hover {

            color: #D30003;

        }
    </style>

    <div class="col-md-12 link">

        <?php

        if (strpos($country, '#')) {

            $country = explode("#", $country)[1];
        }

        ?>



        <a href="<?php echo $page_url; ?>">Conferences in <?php echo $country; ?> 2024</a>,

        <a href="<?php echo $page_url; ?>">Upcoming Conferences in <?php echo $country; ?> 2024</a>,

        <a href="<?php echo $page_url; ?>">International Conferences in <?php echo $country; ?> 2024</a>,



        <a href="<?php echo $page_url; ?>">Conferences in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Academic Conferences in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> <?php echo $country; ?> Conference</a>,

        <a href="<?php echo $page_url; ?>"> Main Event <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Upcoming <?php echo $country; ?> Conference</a>,

        <a href="<?php echo $page_url; ?>"> International Academic Conferences in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Conferences happening in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> <?php echo $country; ?> Events</a>,

        <a href="<?php echo $page_url; ?>"> Main Event in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Main Conference in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Virtual Conferences in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Web Conferences in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Online Conferences in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Web Conferences in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Engineering Conferences in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Business Conferences in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> IT Conferences in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Bio Technology Conferences in <?php echo $country; ?></a>,

        <a href="<?php echo $page_url; ?>"> Paper Presentation in International Conferences in <?php echo $country; ?></a>



    </div>

</div>