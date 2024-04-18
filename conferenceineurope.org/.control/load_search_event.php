<?php

session_start();

$ev_id=$_REQUEST['ev_id'];

$Keyword=$ev_id;



/*if(is_numeric($_REQUEST['ev_id']))

	{

$ev_id=$_REQUEST['ev_id'];

	}

	else {

		echo "<script>alert('invalid Event ID');</script>";

		$ev_id=0;

	}*/

?>



<?php

include"mysqli_dbconn.php";

include("fun.php");



  $query_pag_data = "SELECT * FROM `event` where
										(`event_id` like '%$Keyword%'
													or
										`country` like '%$Keyword%'
													or
										`state` like '%$Keyword%'
													or
										`city` like '%$Keyword%'			
													or
										`org_society` like '%$Keyword%'	
													or
										`event_name` like '%$Keyword%'
													or
										`event_topic` like '%$Keyword%'										
													or		
										`web_url` like '%$Keyword%')
										
										ORDER BY `event_stat` ASC";

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

	$.get('manage_multiple.php',{ev_id_list:ev_id_list},function(d){$('#light').html(d);});

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

                <td width="9%" align="center" class="tab_header1">Event Id</td>

                <!--<td width="6%" align="center" class="tab_header1">Event Type </td>-->

                <td width="6%" align="center" class="tab_header1">Organiser</td>

                <td width="10%" align="center" class="tab_header1">Event Topic </td>

                <td width="15%" align="center" class="tab_header1">Event Name </td>

                <td width="8%" align="center" class="tab_header1">Country</td>

                <td width="7%" align="center" class="tab_header1">Website</td>

                <td width="9%" align="center" class="tab_header1">Event Dates </td>

                <td width="9%" align="center" class="tab_header1">Post Date </td>

                <td colspan="2" align="center" class="tab_header1">Action</td>

              </tr>

              

			  <?php
echo $sql_new_ev;
	$link_new_ev=mysqli_query($link,$sql_new_ev);
$i =0;
			  while($new_ev_data=mysqli_fetch_array($link_new_ev))
			  	{
$i=$i+1;

					if($i%2==0)

					{

					$class="tab_bg1";

					}

					else $class="tab_bg2";	
								


								

			  ?>

			              



              <tr class="<?php echo $class; ?>">

                <td colspan="2" align="center">

                  

                  <input type="checkbox" name="content1[]" class="ads_Checkbox" value="<?php echo  $new_ev_data['event_id']; ?>">                </td>

                <td align="center"><?php echo $new_ev_data['event_id']; ?></td>

                <!--  <td align="center"><?php  //echo event_type($new_ev_data['event_type']); ?></td>-->

                <td align="center"><?php echo  org_detail($new_ev_data['org_id']); ?></td>

                <td align="center"><?php echo  event_topic($new_ev_data['event_topic']); ?></td>

                <td align="center">    <a href="https://www.conferenceineurope.org/conf-detail.php?ev_id=<?php echo $new_ev_data['event_id']; ?>&name=<?php echo $new_ev_data['event_name']; ?>" target="_blank">
                <?php echo $new_ev_data['event_name']; ?>
				   </a></td>

                <td align="center" ><?php echo event_country($new_ev_data['country']); ?></td>

                <td align="center" style="font-size:12px"><?php echo event_url($new_ev_data['web_url']); ?></td>

                <td align="center" class="dt"><?php 

				

				echo date('d.M.Y', strtotime($new_ev_data['event_stat']))."<br>To<br>".date('d.M.Y', strtotime($new_ev_data['event_end']));

				

				

				 ?></td>

                <td align="center"><span class="dt">

                  <?php 

				

				echo date('d.M.Y', strtotime($new_ev_data['date_post']));

				

				

				 ?>

                </span></td>

                <td width="9%" align="center">

                

                

                

                <a href="javascript:void(0);"  name="<?php  echo $new_ev_data['event_id']; ?>" id="ln_<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="details(this.name);"><div id="ln_<?php  echo $new_ev_data['event_id']; ?>">View</div></a> 

                

                

                

                

                </td>

                <td width="12%" align="center">

                

                

                

                

                

                

                

                <a href="javascript:void(0);" id="<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="manage(this.id)">Manage</a>								

	<hr />

    

    <a href="adm_event_edit.php?ev_id=<?php  echo $new_ev_data['event_id']; ?>" target="_blank">Edit</a>

    

    <hr />

    

    

    

    

    

    		

<?php	if(!check_prom($new_ev_data['event_id'])){?>					

<div id="promote_load">				

<a href="javascript:void(0);" id="<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="promote(this.id)"> Promote</a>				</div>

<?php

}

else 

{

//echo "promoted";

?>

<div id="promote_load">				

<a href="javascript:void(0);" id="<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="remove_promote(this.id)">Remove Pro</a>				  </div>				  <?php

}

?>		

       

       

       

       

       

               

                

                

                

           		</td>

              </tr>

			  

			    <tr>

                <td colspan="13"> <div id="det_<?php  echo $new_ev_data['event_id']; ?>"></div>                </td>

                </tr>

			 <?php

			 }

			 
			 ?> 

              <tr>

                <td colspan="3"><label>

                  <input name="Delete" type="submit" id="Delete" value="Delete Events" />

                </label></td>

                <td colspan="2"><input type="button" id="save_value" name="save_value" value="Manage Events" /></td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td colspan="2">&nbsp;</td>

              </tr>

            </table>

</form>





