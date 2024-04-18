<?php
ob_start();
if (!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        .link:hover {
            color: #B9070A;
        }
    </style>
    <?php
    include('script.php');
    ?>
    <?php
    if (!isset($_REQUEST['ev_id'])) {
        exit();
    }
    $ev_id = url_special_char(str_xss($_REQUEST['ev-id']));
    $sql_ev_det = mysqli_query($link, "SELECT * FROM `event` WHERE `event_id` ='$ev_id'");
    $ev_det = mysqli_fetch_array($sql_ev_det);
    extract($ev_det);
    if ($org_id == "") {
        header("location:index.html", true, 301);
    }
    $org_id = $org_id;
    $org_det = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `org_detail` WHERE `org_id`='$org_id'"));
    ?>
    <title><?php echo rem_sl($event_name); ?>: Conference in Europe</title>
    <meta name="description" content="<?php echo rem_sl($short_desc); ?>" />
</head>

<body>
    <?php
    include('header.php');
    ?>
    <section class="inr-body">
        <div class="container">
            <div class="inr-body-content">
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="inr-right-sec">
                            <div class="serchsingle-box ">
                                <h1> <?php echo rem_sl($event_name); ?> </h1>
                                <p> <strong>Conference Details</strong>: <?php echo rem_sl($short_desc); ?>
                                </p>
                                <p><strong>Type</strong> <?php echo event_type($event_type); ?></p>
                                <p><strong>Status</strong>: <span class="status-active">Active</span> </p>
                                <p class="event-detal"><strong>Venue:</strong>
                                    <?php echo $city; ?></a>,<?php echo event_country($country); ?>
                                </p>
                                <p> <strong>Conference Date</strong>: <?php echo  date('Y-M-d', strtotime($event_stat)); ?> - <?php echo  date('Y-M-d', strtotime($event_end)); ?></p>
                                <p> <strong>Deadline for Abstract/Paper Submissions:</strong> <?php echo  date('Y-M-d', strtotime($abstract_deadline)); ?></p>
                                <p><strong>Conference Category</strong>: <?php echo event_topic($event_topic);  ?> </p>
                                <p style="text-align: start;"><strong>Conference Topic</strong> <?php echo     implode(",", explode("#", $keywords));  ?></p>
                                <p><strong>Organize By</strong> <?php echo $org_society; ?></p>
                                <p><strong>Website </strong> <a href="<?php echo $web_url; ?>" target="_blank" class="link">View More</a></p>
                                <p><strong> Email Id</strong>: <?php echo $event_enq_email; ?> </p>
                                <div class="sharelist">
                                    <!-- ShareThis BEGIN -->
                                    <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
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
        </div>
    </section>
    <?php
    include('subscribe.php');
    ?>
    <?php
    include('footer.php');
    ?>
</body>

</html>