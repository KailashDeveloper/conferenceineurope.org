<script language="javascript">



function view_volume()

	{

$( "#vis" ).show();

$( "#viewmore" ).hide();

	}

	

function checkAll(formname, checktoggle)

{

	if(checktoggle==true)

		{

		$('#chk_val_data').val(1);	

    	$('.cls_'+formname+':input:checkbox').each(function() { this.checked = true; });

		}

		else 

		{

			$('#chk_val_data').val(0);

		$('.cls_'+formname+':input:checkbox').each(function() { this.checked = false; });



		}

}

 











</script>



<input type="hidden" value=""  id="chk_val_data" name="chk_val_data" />



<div class="col-md-12" style="line-height:21px">



<?php

if(!isset($link))
include('mysqli_dbconn.php');



//$sql_top_chk=mysqli_query($link,"SELECT * FROM `event_topic` ORDER BY `topic` ASC limit 0,20");

$upd_cat="";

$dis=0;

$sql_top_chk=mysqli_query($link,"SELECT * FROM `event_topic` join `event_cat` where `event_topic`.`cat_id` = `event_cat`.`id` ORDER BY `event_cat`.`category` ASC limit 0,42");



while($to_chk_data=mysqli_fetch_array($sql_top_chk))

{

	extract ($to_chk_data);	

	if($upd_cat!=$category)

	{

	$upd_cat=$category;

	$dis=1;

	}

?>

<?php 

if($dis==1){

	?>

<div class="col-md-12">

<h3>

<?php 

echo $upd_cat; 

$dis=0;

$upd_cat_ss=str_replace(" ","_",$upd_cat);

?>

 </h3>

 

 <!--<a href="javascript:void();" onclick="javascript:checkAll('<?php echo $upd_cat_ss; ?>', true);"><img src="images/checked.png" /></a>	

 <a href="javascript:void();" onclick="javascript:checkAll('<?php echo $upd_cat_ss; ?>', false);"><img src="images/uncheck.png" /></a>

--></div>

<?php

}

?>

<div style="" class="col-md-6">



<input type="checkbox" name="chk_topic[]" id="chk_topic[]" value="<?php echo $to_chk_data['topic']; ?>"  onclick="$('#chk_val_data').val(1);" class="cls_<?php echo $upd_cat_ss; ?>"> <?php echo $to_chk_data['topic']; ?> </div>



<?php



}



?>


<div class="col-md-12">
<a href="javascript:void(0);" id="viewmore" style="font-size:14px; width:100%; " class="link" onclick="view_volume()">View More</a>
</div>






	 	<div id="vis" style="display:none">







<?php

$upd_cat="";

$dis=0;

$upd_cat_ss="";



$sql_top_chk=mysqli_query($link,"SELECT * FROM `event_topic` join `event_cat` where `event_topic`.`cat_id` = `event_cat`.`id` ORDER BY `event_cat`.`category` ASC limit 42,400");



while($to_chk_data=mysqli_fetch_array($sql_top_chk))

{

	extract ($to_chk_data);	

	if($upd_cat!=$category)

	{

	$upd_cat=$category;

	$dis=1;

	}

?>

<?php 

if($dis==1){

	?>

<div class="col-md-12">

<h3>

<?php 

echo $upd_cat; 

$dis=0;



$upd_cat_ss=str_replace(" ","_",$upd_cat);

?>

 </h3>

<!-- <a href="javascript:void();" onclick="javascript:checkAll('<?php echo $upd_cat_ss; ?>', true);"><img src="images/checked.png" /></a>	

 <a href="javascript:void();" onclick="javascript:checkAll('<?php echo $upd_cat_ss; ?>', false);"><img src="images/uncheck.png" /></a>

-->

</div>

<?php

}

?>

<div class="col-md-6" style="">



<input type="checkbox" name="chk_topic[]" id="chk_topic[]" value="<?php echo $to_chk_data['topic']; ?>"  onclick="$('#chk_val_data').val(1);" class="cls_<?php echo $upd_cat_ss; ?>"> <?php echo $to_chk_data['topic']; ?> </div>



<?php



}



?>



</div>



















</div>