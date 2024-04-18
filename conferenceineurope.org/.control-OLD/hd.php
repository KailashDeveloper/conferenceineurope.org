<?php

include("mysqli_dbconn.php");

include("fun.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Papermashup.com | Sliding Div</title>

<link href="../style.css" rel="stylesheet" type="text/css" />

<style>



body{

font-family:Verdana, Geneva, sans-serif;

font-size:14px;}



.slidingDiv {

	height:300px;

	background-color: #99CCFF;

	padding:20px;

	margin-top:10px;

	border-bottom:5px solid #3399FF;

}



.show_hide {

	display:none;

}





</style>





</head>



<body>









<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>

<script type="text/javascript">



$(document).ready(function(){

    $(".slidingDiv").hide();

	$(".show_hide").show();	

	$('.show_hide').click(function(){

	$(".slidingDiv").slideToggle();

	});



});



</script>



 <a href="#" class="show_hide">Show/hide</a><br />

    <div class="slidingDiv">



        Fill this space with really interesting content. <a href="#" class="show_hide">hide</a>

    </div>





</div>

<br />

<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="5%" align="center" class="tab_header1">Sl No. </td>

                <td width="14%" align="center" class="tab_header1">Event Type </td>

                <td width="12%" align="center" class="tab_header1">Event Topic </td>

                <td width="18%" align="center" class="tab_header1">Event Name </td>

                <td width="9%" align="center" class="tab_header1">Country</td>

                <td width="9%" align="center" class="tab_header1">Website</td>

                <td width="13%" align="center" class="tab_header1">Event Dates </td>

                <td width="8%" align="center" class="tab_header1">Post Date </td>

                <td colspan="2" align="center" class="tab_header1">Action</td>

              </tr>

              

			  <?php

			  $sql_new_ev="SELECT * FROM `event` WHERE `status`='New' order by `event_id` desc";

			  $link_new_ev=mysqli_query($link,$sql_new_ev);

			  while($new_ev_data=mysqli_fetch_array($link_new_ev))

			  	{

								if($j%2==0)

								{

								$class="tab_bg1";

								}

								else

								{

								$class="tab_bg2";

								}

								$j++;

			  ?>

			              



              <tr class="<?php echo $class; ?>">

                <td align="center"><?php echo $j; ?></td>

                <td align="center"><?php echo  event_type($new_ev_data['event_type']); ?></td>

                <td align="center"><?php echo  event_topic($new_ev_data['event_topic']); ?></td>

                <td align="center"><?php echo $new_ev_data['event_name']; ?></td>

                <td align="center"><?php echo event_country($new_ev_data['country']); ?></td>

                <td align="center"><?php echo event_url($new_ev_data['web_url']); ?></td>

                <td align="center" class="dt"><?php 

				

				echo date('d.M.Y', strtotime($new_ev_data['event_stat']))."<br>To<br>".date('d.M.Y', strtotime($new_ev_data['event_end']));

				

				

				 ?></td>

                <td align="center"><span class="dt">

                  <?php 

				

				echo date('d.M.Y', strtotime($new_ev_data['date_post']));

				

				

				 ?>

                </span></td>

                <td width="6%" align="center"><a href="javascript:void(0);"  name="<?php  echo $new_ev_data['event_id']; ?>" id="ln_<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="details(this.name);">View</a></td>

                <td width="6%" align="center"><a href="#" class="link">Manage</a></td>

              </tr>

			  

			    <tr>

                <td colspan="10"> <div id="det_<?php  echo $new_ev_data['event_id']; ?>"></div></td>

                </tr>

			 <?php

			 }

			 ?> 

              <tr>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td colspan="2">&nbsp;</td>

              </tr>

            </table>