<?php
session_start();
$name = time().$_FILES["images"]["name"];
$_SESSION['ad_image']=$name;        
        move_uploaded_file( $_FILES["images"]["tmp_name"], "../ad/" . $name);
   
echo "Successfully Uploaded Images";
?>
