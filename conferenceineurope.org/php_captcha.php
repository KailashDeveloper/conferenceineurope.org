<?php
session_start();
$RandomStr = md5(microtime());// md5 to generate the random string
$ResultStr = substr($RandomStr,0,5);//trim 5 digit 
$num1 = rand(1,9); 
$num2 = rand(1,9); 
$ResultStr="$num1 + $num2";
$NewImage =imagecreatefromjpeg("images/img.jpg");//image create by existing image and as back ground 
//$LineColor = imagecolorallocate($NewImage,233,239,239);//line color 
$TextColor = imagecolorallocate($NewImage, 11, 11, 11);//text color-white
//imageline($NewImage,1,1,40,40,$LineColor);//create line 1 on image 
//imageline($NewImage,1,100,60,0,$LineColor);//create line 2 on image 
imagestring($NewImage, 5, 20, 10, $ResultStr, $TextColor);// Draw a random string horizontally 
//$_SESSION['key'] = $ResultStr;// carry the data through session
$_SESSION['key'] = $num1+$num2 ;// carry the data through session
header("Content-type: image/jpeg");// out out the image 
imagejpeg($NewImage);//Output image to browser 
?>
