<?php
ob_start();
if (!isset($_SESSION))session_start();
$topic='Psychology';
?>
<!DOCTYPE html>

<html>
    <head>
       
      <?php
	  include('script.php');
	  ?>
	  
    <?php include('topic_meta.php'); ?>
      
      
    </head>
    <body>

      
       <?php
	   include('header.php');
	   ?>
	  
	  <section class="inr-body"> 
      
      
          <?php include('topic_body.php'); ?> 
            
            

        </section>
	 
       <?php
	   include('subscribe.php');
	   ?>
      
 
        <?php
	   include('footer.php');
	   ?>










    </body>
</html>
