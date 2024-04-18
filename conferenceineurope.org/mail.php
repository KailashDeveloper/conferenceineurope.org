<?php 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "info@ijifactor.com";
    $to = "sanjeeb.dakhinaray@gmail.com";
    $subject = "PHP Mail Test script";
    $message = "This is a test to check the PHP Mail functionality";
    $headers = "From:" . $from;
   $status =  mail($to,$subject,$message, $headers);
   print_r(   $status);
    echo "Test email sent";
?>