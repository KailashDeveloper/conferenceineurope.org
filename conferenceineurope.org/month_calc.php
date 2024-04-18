 
	<?php
    $m = date('n');
	$m1=$m;
	$y=date('Y');
$m_array=[];
    for($i=0;$i<12;$i++){
	//$m_array[] = date('F', mktime(0,0,0,$m+$i,15,2011))." ". $y;
   $m_array[] = date('M', mktime(0,0,0,$m+$i,15,2011))." ". $y;

	$m_ar[] = date('F', mktime(0,0,0,$m+$i,15,2011))." ";
	$m_a[] = $y."-".date('m', mktime(0,0,0,$m+$i,15,2011));
	$m1=$m1+1;
	//you could echo here, but may be handy to place in an array. Also the day (15) and year (2011) do not matter - I just picked 15 as it's a mid-number for months.
	/*if($m==12)	
		{
		echo 2014;
		}*/
    if($m1>12)
		{
	  $y=$y+1;
	  $m1=0;
		}
    }
  //  echo implode("<br />", $m_array);
 
?>	