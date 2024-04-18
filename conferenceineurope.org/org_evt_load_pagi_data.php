<?php
if(!isset($link)) include('mysqli_dbconn.php');
if(!isset($fun)) include('fun.php');
$month=date("Y-m");
$cur_m=date("Y-m");
?>
<?php
if(!isset($_REQUEST['limit_events_p']))
	{
	$limit_events_p=0;		
	}
	else $limit_events_p= $_REQUEST['limit_events_p'];

$where_country="";
$where_topic="";
$where_month="";

if(isset($country))
{
$where_country="`country` like '%$country%' ";
}

else
{
	$where_country="`country` like '%%' ";
}



if(isset($topic))
{
$where_topic="`keywords` like '%$topic%' or `event_topic` like '%###$topic###%'   ";
}

else
{
	$where_topic="`keywords` like '%%' ";
}




if(isset($_REQUEST['date']))
{
$srh_date=$_REQUEST['date'];
$where_month="`event_stat` like '%$srh_date%' ";	
}

else{
$where_month="`event_stat` like '%%' ";
}


?>



<?php 


	$combine_sql="SELECT * FROM `event` WHERE $cond  ORDER BY `event_stat` ASC limit $limit_events_p , 50";

	$sql_con_list=mysqli_query($link,$combine_sql);

	$total_event_p=mysqli_num_rows($sql_con_list);

	

	if(mysqli_num_rows($sql_con_list)==0)

	{

	 echo "No Event Found";

	}

	

	while($accept_data=mysqli_fetch_array($sql_con_list))

	{    

	extract($accept_data);             

	 include('org_list_thumb.php');       

	}

	

	$limit_events_p=$limit_events_p+100;

?>





<form name="lad_pagi"> 

<input type="hidden" name="country"  id="country"  value="<?php echo $country; ?>">

<input type="hidden" name="total_events_p"  id="total_events_p"  value="<?php echo $total_event_p; ?>">

<input type="hidden" name="limit_events_p"  id="limit_events_p"  value="<?php echo $limit_events_p; ?>">

</form>



<?php

if($total_event_p>0)

{

?>

<div class="load_advan_data">

<center>

<a href="javascript:void(0);" name=""  id="load_btn_<?php echo $limit_events_p; ?>" onClick="load_event_p_fun(this.id)"><button type="button" name="loadmore" id="loadmorebtn" class="loadmore-btn btn btn-submit">Load More</button></a>

</center></div>

<?php

}

?>





<script language="javascript">



function load_event_p_fun()

	{

		var limit_var='<?php echo $limit_events_p; ?>';

		

			<?php

			if(isset($_REQUEST['date']))

			{

			?>

			var currentUrl_p = window.location.href+"&limit_events_p="+limit_var;

			<?php

			}	

			else

			{

			?>

			var currentUrl_p = window.location.href+"?limit_events_p="+limit_var;

			<?php

			}

			?>

			

		

		$("#load_btn_"+limit_var).hide(400);	

		

		

		

		$.ajax({

					url: currentUrl_p,

					type: 'post',

					cache: false,

					processData: true, 

					beforeSend: function () { 			                  

				    $("#load_event_p").html('<center><i class="fa fa-spinner fa-spin fa-2x"></i> <br><span>Searching Please Wait...</span></center>').show();

		

					},                 

					success: function (response) {	

									

					$('#load_event_p').replaceWith($(response).find('#loading_events'));

					//$("#loader").hide(400);

				

					},

					error: function (XMLHttpRequest, textStatus, errorThrown) {

						

					$('#load_event_p'+limit_var).html('<div class="error"><i class="fa fa-times"></i> Unknown page url</div>');

					}

					});

	}



</script>





<div id="load_event_p">



</div>



     
<?php
if(isset($link)){
mysqli_close($link);
	unset($link);
}
?>