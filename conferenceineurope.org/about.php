<?php
ob_start();
if (!isset($_SESSION))session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <title>conferenceineurope</title>
      <?php
	  include('script.php');
	  ?>
	  
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
                        include('right_part.php');
                        ?>
                        </div>

                        <div class="col-md-9 pull-left">
                            <div class="inr-right-sec">
                            
                            <div class="inr-up-cmng-evnt-box mbt40 page_hed">
                             <h2> About Us</h2>
                             </div>
                            
                            
                                <div class="inr-up-cmng-evnt-box mbt40">

                                    
                                  Conferences and meetings create an environment that brings people together to educate, learn, share ideas and information. CIE i.e. Conference in Europe's responsibility is to identify your needs and to bring people together in one place to create an environment that promotes research and innovations in Europe. Conference in Europe is trusted by several highly successful conference organizers and planners, to help them spread the word about their upcoming events among their target audience in Europe. It is an online platform to list conferences, seminars, meetings, events, and workshops offering the relevant listing services. Use CIE to find upcoming academic conferences in Europe in 2024. Subscribe to our monthly newsletter to get all the updates. Promote your events and get started
<strong></strong>

                                </div>



                               




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
