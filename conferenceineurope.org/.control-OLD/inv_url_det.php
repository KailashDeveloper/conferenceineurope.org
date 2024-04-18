<?php

ob_start();

session_start();

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

//error_reporting(E_ALL);



if(!isset($_SESSION['ALERT_ADMIN']))

header("location:index.php");



include("mysqli_dbconn.php");

include("fun.php");





$url=$_REQUEST['url'];













$query_pag_data = "SELECT * FROM `event` WHERE `web_url`='$url' and event_stat >now() and status !='DISABLE' ORDER BY `event_end` DESC";





$result_pag_data = mysqli_query($link,$query_pag_data) or die('MySql Error' . mysqli_error($link));

$sql_new_ev=$query_pag_data;



?>



<script type="text/javascript">

function checkAll(formname, checktoggle)

{

     var checkboxes = new Array();

      checkboxes = document[formname].getElementsByTagName('input');

      for (var i = 0; i < checkboxes.length; i++) {

          if (checkboxes[i].type === 'checkbox') {

               checkboxes[i].checked = checktoggle;

          }

      }

}



$(function(){

		   

$('#event_table').submit(function(e){	

							

e.preventDefault();

var form=$(this);

var post_data=form.serialize();

var post_url=form.attr('action');

$('#del_ld').html("loading");



if(confirm("Sure want to detete"))

			{

  $.ajax({

  type:"POST",

  url:post_url,

  data:post_data,

  success:function(msg){$('#del_ld').html(msg);}

  });

  }

  });

  });







$('#save_value').click(function(){

var ev_id_list="";

    $('.ads_Checkbox:checked').each(function(){

         //alert($(this).val());

		 ev_id_list=ev_id_list+"#"+$(this).val();

    });

	//alert(ev_id_list);

	$.get('disable_multiple.php',{ev_id_list:ev_id_list},function(d){$('#light').html(d);});

	document.getElementById('light').style.display='block';

	document.getElementById('fade').style.display='block';	

});



</script>

<div id="del_ld"></div>

<form name="event_table" id="event_table" action="delete_event.php">



<table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="3%" align="center" class="tab_header1">

				

				<a href="javascript:void();" onclick="javascript:checkAll('event_table', true);"><img src="images/checked.png" /></a><a href="javascript:void();" onclick="javascript:checkAll('event_table', false);"></a>				</td>

                <td width="3%" align="center" class="tab_header1"><a href="javascript:void();" onclick="javascript:checkAll('event_table', false);"><img src="images/uncheck.png" /></a></td>

                <td width="8%" align="center" class="tab_header1">Event Id</td>

                <!--<td width="6%" align="center" class="tab_header1">Event Type </td>-->

                <td width="9%" align="center" class="tab_header1">Organiser</td>

                <td width="19%" align="center" class="tab_header1">Event Name </td>

                <td width="8%" align="center" class="tab_header1">Country</td>

                <td width="33%" align="center" class="tab_header1">Website</td>

                <td width="7%" align="center" class="tab_header1">Status</td>

                <td width="10%" align="center" class="tab_header1">Event Dates</td>

              </tr>

              

			  <?php

			 // $sql_new_ev="SELECT * FROM `event` WHERE `status`='pending' order by `event_id` Asc";

			  $link_new_ev=mysqli_query($link,$sql_new_ev);

			  while($new_ev_data=mysqli_fetch_array($link_new_ev))

			  	{

								

					

								

			  ?>

			              



              <tr class="<?php echo $class; ?>">

                <td colspan="2" align="center">

                  

                  <input type="checkbox" name="content1[]" class="ads_Checkbox" value="<?php echo  $new_ev_data['event_id']; ?>">                </td>

                <td align="center"><?php echo $new_ev_data['event_id']; ?><br>

<a href="javascript:void(0);" id="<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="manage(this.id)">Manage</a>



</td>

                <!--  <td align="center"><?php  //echo event_type($new_ev_data['event_type']); ?></td>-->

                <td align="center"><?php echo  org_detail($new_ev_data['org_id']); ?></td>

                <td align="center" style="font-size:11px;"><?php echo $new_ev_data['event_name']; ?></td>

                <td align="center" ><?php echo event_country($new_ev_data['country']); ?></td>

                <td align="center" style="font-size:12px"><?php echo $new_ev_data['web_url']; ?></td>

                <td align="center" style="font-size:12px"><?php echo $new_ev_data['status']; ?></td>

                <td align="center" class="dt"><?php 

				

				echo date('d.M.Y', strtotime($new_ev_data['event_stat']))."<br>To<br>".date('d.M.Y', strtotime($new_ev_data['event_end']));

				

				

				 ?>

                <br>

                <span style="color:#000000">PO-<?php 	echo date('d.M.Y', strtotime($new_ev_data['date_post'])); ?></span></td>

              </tr>

			  

			    <tr>

                <td colspan="10"> <div id="det_<?php  echo $new_ev_data['event_id']; ?>"></div>                </td>

                </tr>

			 <?php

			

			 }

			 ?> 

              <tr>

                <td colspan="3"></td>



                <td><input type="button" id="save_value" name="save_value" value="Manage Events" /></td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td colspan="2">&nbsp;</td>

                <td colspan="2">&nbsp;</td>

              </tr>

            </table>

</form>





