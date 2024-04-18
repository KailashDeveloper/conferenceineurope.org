<?php
session_start();
$name = time().$_FILES["images"]["name"];
$_SESSION['logo']=$name;       
        move_uploaded_file( $_FILES["images"]["tmp_name"], "logo/" . $name);
   
echo "Successfully Uploaded Images";
?>
