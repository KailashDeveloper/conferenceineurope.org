<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if(!isset($_SESSION['ALERT_ADMIN']))
header("location:index.php");



include("mysqli_dbconn.php");

include("fun.php");





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Admin Pannel</title>

<script language="javascript" src="../js/jquery.min.js"></script>



<link rel="stylesheet" type="text/css" href="css/admin.css" />

<link rel="stylesheet" type="text/css" href="css/vmenu.css" />

<script type="text/javascript" src="js/menu.js"></script>

<link rel="stylesheet" type="text/css" href="css/sddm.css" >

<link rel="stylesheet" type="text/css" href="css/form.css" >

<script language="javascript" >

function details_list(id,url)

	{

	

		

			if($('#ln_'+id).text()=='View')

			{				

			$('#ln_'+id).html("Hide");

			$('#ln_'+id).addClass('view_text');

			$('#det_'+id).html("<img src='images/loading.gif' width='40' height='40' />");	

			$.get("inv_url_det.php",{ev_id:id,url:url},function(d){$("#det_"+id).html(d)});

			}

	

				else if($('#ln_'+id).text()=='Hide')

				{

				$('#ln_'+id).text('View');

				$('#ln_'+id).addClass('hidetext');

				$('#det_'+id).html("");

				}	

				

	}

	

	

	function manage(id)	

	{

	$.get('manage.php',{ev_id:id},function(d){$('#light').html(d);});

	document.getElementById('light').style.display='block';

	document.getElementById('fade').style.display='block';	

	}

</script>







</head>



<body>





<div id="fade" class="black_overlay"></div>

        <div id="light" class="white_content">



		</div>

       





 

	



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td colspan="3" bgcolor="#f5f5f5" background="images/header-bg.jpg">

    	<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="31%"><img src="images/logo.png" alt="logo" /></td>

    <td width="69%" align="right" valign="middle">

      <?php

include("top_menu.php");

?>



    </td>

  </tr>

</table>



    </td>

  </tr>

  <tr>

    <td height="461" colspan="3" align="center" valign="top">

	<table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td valign="top">&nbsp;</td>

        <td align="center" valign="middle">&nbsp;</td>

      </tr>

      <tr>

        <td width="16%"  valign="top">

        <?php include('menu.php'); ?></td>

        <td width="80%" align="center" valign="top"><table width="100%" height="129" border="0" cellpadding="0" cellspacing="0">

          <tr>

            <td height="37" align="center" class="inner_welcome">New Event Details </td>

          </tr>

          

          <tr>

            <td>

            







<?php
 
 $hide_sql="
update `event` set `status`='IRAJHIDE' 
 WHERE `org_id` ='1'
 and(
	`web_url` like '%worldresearchsociety.com%' or
	`web_url` like '%conferencefora.org%' or
	`web_url` like '%eurasiaweb.com%' or
	`web_url` like '%universal-conference.com%' 
 ) 
and ( 
`country` like '%Brazil' or
`country` like '%Canada' or
`country` like '%Czech Republic' or
`country` like '%India' or
`country` like '%Italy' or
`country` like '%South Korea' or
`country` like '%Azerbaijan' or
`country` like '%China' or
`country` like '%Greece' or
`country` like '%Hong Kong' or
`country` like '%Ireland' or
`country` like '%Kuwait' or
`country` like '%Brazil' or
`country` like '%Malaysia' or
`country` like '%Morocco' or
`country` like '%New Zealand' or
`country` like '%Norway' or

`country` like '%South Africa' or
`country` like '%Thailand' or
`country` like '%Turkey' or
`country` like '%United Arab Emirates' or
`country` like '%Brazil' or
`country` like '%Ukraine' or
`country` like '%Australia' or

`country` like '%Belgium' or
`country` like '%Cuba' or
`country` like '%Germany' or
`country` like '%Brazil' or
`country` like '%Indonesia' or
`country` like '%Philippines' or
`country` like '%Qatar' or

`country` like '%Saudi Arabia' or
`country` like '%Sri Lanka' or
`country` like '%United Kingdom' or
`country` like '%United States of America' or
`country` like '%Vietnam' or
`country` like '%Myanmar' or
`country` like '%Bangladesh' or

`country` like '%Egypt' or
`country` like '%Brazil' or
`country` like '%Finland' or
`country` like '%Israel' or

`country` like '%Netherlands' or

`country` like '%Spain' or
`country` like '%Taiwan' or
`country` like '%Bulgaria' or
`country` like '%Chile' or
`country` like '%Denmark' or
`country` like '%Japan' or
`country` like '%Russian Federation' or


`country` like '%Sweden' or

`country` like '%Estonia' or
`country` like '%Luxembourg' or
`country` like '%Mexico' or
`country` like '%Brunei Darussalam' or
`country` like '%France' or

`country` like '%Mauritius' or

`country` like '%Poland' or
`country` like '%Romania' or
`country` like '%Singapore' or
`country` like '%Cambodia' or

`country` like '%Hungary' or
`country` like '%Uzbekistan' or
`country` like '%Austria' or
`country` like '%Iran' or
`country` like '%Bahrain' or
`country` like '%Oman' or

`country` like '%Switzerland' or
`country` like '%Korea (south)' or
`country` like '%Portugal'  ) ";
mysqli_query($link,$hide_sql);



$query_pag_data = "SELECT * FROM `event` WHERE `org_id` ='1' and `status`='ACCEPT' and ( 
`country` like '%Brazil' or
`country` like '%Canada' or
`country` like '%Czech Republic' or
`country` like '%India' or
`country` like '%Italy' or
`country` like '%South Korea' or
`country` like '%Azerbaijan' or
`country` like '%China' or
`country` like '%Greece' or
`country` like '%Hong Kong' or
`country` like '%Ireland' or
`country` like '%Kuwait' or
`country` like '%Brazil' or
`country` like '%Malaysia' or
`country` like '%Morocco' or
`country` like '%New Zealand' or
`country` like '%Norway' or

`country` like '%South Africa' or
`country` like '%Thailand' or
`country` like '%Turkey' or
`country` like '%United Arab Emirates' or
`country` like '%Brazil' or
`country` like '%Ukraine' or
`country` like '%Australia' or

`country` like '%Belgium' or
`country` like '%Cuba' or
`country` like '%Germany' or
`country` like '%Brazil' or
`country` like '%Indonesia' or
`country` like '%Philippines' or
`country` like '%Qatar' or

`country` like '%Saudi Arabia' or
`country` like '%Sri Lanka' or
`country` like '%United Kingdom' or
`country` like '%United States of America' or
`country` like '%Vietnam' or
`country` like '%Myanmar' or
`country` like '%Bangladesh' or

`country` like '%Egypt' or
`country` like '%Brazil' or
`country` like '%Finland' or
`country` like '%Israel' or

`country` like '%Netherlands' or

`country` like '%Spain' or
`country` like '%Taiwan' or
`country` like '%Bulgaria' or
`country` like '%Chile' or
`country` like '%Denmark' or
`country` like '%Japan' or
`country` like '%Russian Federation' or


`country` like '%Sweden' or

`country` like '%Estonia' or
`country` like '%Luxembourg' or
`country` like '%Mexico' or
`country` like '%Brunei Darussalam' or
`country` like '%France' or

`country` like '%Mauritius' or

`country` like '%Poland' or
`country` like '%Romania' or
`country` like '%Singapore' or
`country` like '%Cambodia' or

`country` like '%Hungary' or
`country` like '%Uzbekistan' or
`country` like '%Austria' or
`country` like '%Iran' or
`country` like '%Bahrain' or
`country` like '%Oman' or

`country` like '%Switzerland' or
`country` like '%Korea (south)' or
`country` like '%Portugal'  ) ";





$result_pag_data = mysqli_query($link,$query_pag_data) or die('MySql Error' . mysqli_error($link));

$sql_new_ev=$query_pag_data;



?>







<table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="8%" align="center" class="tab_header1">Event Id</td>

                <!--<td width="6%" align="center" class="tab_header1">Event Type </td>-->

                <td width="38%" align="center" class="tab_header1">Website</td>

                <td width="32%" align="center" class="tab_header1">Event Dates </td>

                <td width="4%" align="center" class="tab_header1">Country</td>

                <td colspan="2" align="center" class="tab_header1">Action</td>

              </tr>

              

			  <?php

			 // $sql_new_ev="SELECT * FROM `event` WHERE `status`='pending' order by `event_id` Asc";

			  $link_new_ev=mysqli_query($link,$sql_new_ev);

			  while($new_ev_data=mysqli_fetch_array($link_new_ev))

			  	{

								

						

								

			  ?>

			              



              <tr class="<?php echo $class; ?>">

                <td align="center"><?php echo $new_ev_data['event_id']; ?></td>

                <!--  <td align="center"><?php  //echo event_type($new_ev_data['event_type']); ?></td>-->

                <td align="left" style="font-size:12px"><?php echo $new_ev_data['web_url']; ?></td>

                <td align="center" class="dt"><?php 

				

				echo date('d.M.Y', strtotime($new_ev_data['event_stat']));

				

				

				 ?></td>

                <td align="center" class="dt"><?php echo $new_ev_data['country']; ?>&nbsp;</td>

                <td colspan="2" align="center">

                <a href="javascript:void(0);"  name="<?php  echo $new_ev_data['event_id']; ?>" id="ln_<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="details_list(this.name,'<?php echo $new_ev_data["web_url"]; ?>');"><div id="ln_<?php  echo $new_ev_data['event_id']; ?>">View</div></a>                <a href="adm_event_edit.php?ev_id=<?php  echo $new_ev_data['event_id']; ?>" target="_blank"></a></td>

                </tr>

			  

			    <tr>

                <td colspan="7"> <div id="det_<?php  echo $new_ev_data['event_id']; ?>"></div>                </td>

                </tr>

			 <?php

			

			 }

			 ?> 

              <tr>

                <td>

                

                <td>&nbsp;</td>

                <td colspan="2">&nbsp;</td>

                <td width="3%">&nbsp;</td>

                <td width="15%" colspan="2">&nbsp;</td>

              </tr>

            </table>





<br /></td>

          </tr>

        </table></td>

      </tr>

    </table></td>

  </tr>

      <tr>

        <td valign="top">&nbsp;</td>

        <td align="center" valign="middle">&nbsp;</td>

      </tr>

	      <tr>

        <td valign="top">&nbsp;</td>

        <td align="center" valign="middle">&nbsp;</td>

      </tr>

  <tr>

    <td height="100" colspan="3"  background="images/header-bg.jpg"><div class="copyright">Copyright &copy; 2013, All Rights Reserved, Powered By &nbsp; Conferencealerts</div></td>

  </tr>

</table>



</body>

</html>

