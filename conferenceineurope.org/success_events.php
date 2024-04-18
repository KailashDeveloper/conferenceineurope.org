<?php
ob_start();
if (!isset($_SESSION))session_start();
if($_SESSION['LOGIN_TYPE']!='ORGANIZER')
{
header("location:index.php");
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Organizer Panel</title>
      <?php
	  include('script.php');
	  ?>
	  
    </head>
<body>

  <?php
   include('header_menue.php');
   ?>
  
      
     <section class="home-banner inr-bnr">

            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h1> Organizer Panel </h1>
                        <!--<p> Click here to add your conference to CIB worldwide listing or to create an conference organiser account.</p>-->
                    </div>
                    <div class="col-md-2"></div>
                </div>


            </div>

        </section> 
      
      
      
      
      
	  <section class="inr-body"> 
            <div class="container">
                <div class="inr-body-content">
                    <div class="row">
                        <div class="col-md-3 pull-right">
						<?php
                        include('org_menu.php');
                        ?>
                        </div>

                        <div class="col-md-9 pull-left">
                            <div class="inr-right-sec">
                            
                            <div class="inr-up-cmng-evnt-box mbt40 page_hed">
                             <h2>  Welcome Organizer </h2>
                             </div>
                            
                            
                                <!--<div class="inr-up-cmng-evnt-box mbt40">
                                    <div class="inr-evndid"> Event ID: COnF142059</div>

                                    <a href="#" class="inr-up-cmng-evnt-box-title"> WRFER - International Conference On Electrical and Electronics Engineering ICEEE</a>
                                    <div class="inr-evnt-box-list">
                                        <ul> 
                                            <li><i class="fa fa-calendar"></i> 2019-12-24 </li>
                                            <li><i class="fa fa-map-marker"></i> Usa  </li>
                                            <li><i class="fa fa-map-marker"></i> America </li>
                                            <li><i class="fa fa-book"></i> Electronics And Electrical  </li>
                                        </ul>
                                    </div>
                                    <a href="#" class="inr-up-cmng-evnt-link"> <i class="fa fa-chevron-right"> </i></a>

                                </div>-->



                            
                       <?php
$org=$_SESSION['LOGIN_USER'];
$sql_det=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_mail`='$org'"));
$org_id=$sql_det['org_id'];
$status="Accept";
$cond= "`org_id` = '$org_id' and ( `status`='$status' and `event_stat` <= curdate() )";
?>

<?php include('org_evt_body.php'); ?>  
                              




                            </div>
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
