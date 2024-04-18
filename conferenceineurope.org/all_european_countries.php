<?php

ob_start();

if (!isset($_SESSION)) session_start();

?>



<!DOCTYPE html>







<html lang="en">



<head>



    <?php include('script.php'); ?>



    <title>Conference in Europe 2024 - International Academic Conferences in Europe</title>



    <meta name="keywords" content="International Conferences in Europe, Engineering Conferences in Europe, Conferences in Europe , Business Conferences in Europe , Europe  Conferences 2024, Upcoming Conferences in Europe , Academic Conferences in Europe , Call for Paper in Europe, Paper Submission, Engineering Conferences 2024" />



    <meta name="description" content="Upcoming Conference in Europe 2024. Find the list of upcoming conferences in Europe through our website. Subscribe today to get future conferences in Europe in your inbox." />

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>F
</head>



<body>



    <?php include('header.php'); ?>



    <section>
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
                        ?>
                        <ul>

                            <?php

                            $listcountry = [];

                            while ($country_data = mysqli_fetch_array($cont_link)) {

                                extract($country_data);

                                $listcountry[] = "'" . $id . "#" . $country . "'";

                                $fl_name = $dycontpage = sp_replace_hi($country);

                                $dycontpage = strtolower(sp_replace_hi($country)) . ".php";

                            ?>




                                <li class="col-md-3"><a href="<?php echo $dycontpage; ?>" title="Conference in <?php echo $country; ?>" class="confrence">

                                        <!--

<img src="allflags/<?php echo $fl_name; ?>.png" alt="Flag of <?php echo $country; ?>"  height="20"/>

-->

                                        <strong>>> </strong><span itemprop="areaServed"><?php echo $country; ?></span></a></li>



                            <?php } ?>

                        </ul>
                        <?php
                        ?>
                    <?php } ?>
                </div>
            </div>
        </div>

    </section>

    <!-- <h2>Modal Example</h2>

 
    <button id="myBtn">Open Modal</button>


    <div id="myModal" class="modal">


        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Some text in the Modal..</p>
        </div>

    </div> -->

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        var allBtn = document.getElementsByClassName("allBtn")

        allBtn.onclick = function() {
            modal.style.display = "block";
            console.log("data");
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
            console.log("data");
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>













    <?php include('footer.php'); ?>


</body>



</html>