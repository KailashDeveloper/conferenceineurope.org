<?php
ob_start();
if (!isset($_SESSION))session_start();
?>
<!DOCTYPE html>

<html>
    <head>
       
      <?php
	  include('script.php');
	  ?>
	  <title> Advance Search</title>
     <?php //include('country_meta.php'); ?>
      
      
    </head>
    <body>

      
       <?php
	   include('header.php');
	   ?>
	  
	  <section class="inr-body"> 
      
      
            <div class="container">
                <div class="inr-body-content">
                    <div class="row">
                        <div class="col-md-3 pull-right">
								<?php
                                include('country_right.php');
                                ?>
                        </div>

                        <div class="col-md-9 pull-left">
                            <div class="inr-right-sec">
                            
                            <div class="inr-up-cmng-evnt-box mbt40 page_hed">
                             <h2>Advance Search</h2>
                             
                             <?php  include('cont-place-menu.php'); ?>   
                             </div>
                            
                            
                            
                        <div id="loading_events">

                       <?php include('search_load_pagi_data.php'); ?> 

                       </div>    
                       
                       
                            <!--
                            
                                <div class="inr-up-cmng-evnt-box mbt40">
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

                                </div>

                                

                                <div class="text-center">
                                    <a href="#" class="load-more-btm"> Load More</a>
                                </div>-->




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
