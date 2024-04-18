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
<br>
<br>
<br>
<br>


    <h1> <center> 404 Error </center> </h1>  
	
    <br>
<br>
<br>
<br>
<br>
   <?php
	   include('subscribe.php');
	   ?>
     <br>
 
 
        <?php
	   include('footer.php');
	   ?>










    </body>
</html>
