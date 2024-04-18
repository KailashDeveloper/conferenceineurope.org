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



													and



										`status`='Accept'



													and



										`event_end` >= curdate()



										



										ORDER BY `event_stat` ASC";

$result_pag_data = mysqli_query($link,$query_pag_data) or die('MySql Error' . mysqli_error($link));



$sql_new_ev=$query_pag_data;



?>









<table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="6%" align="center" class="tab_header1">Event Id</td>

                <td align="center" class="tab_header1">Event Topic </td>

                <td width="18%" align="center" class="tab_header1">Event Name </td>

                <td width="9%" align="center" class="tab_header1">Country</td>

                <td width="9%" align="center" class="tab_header1">Website</td>

                <td width="13%" align="center" class="tab_header1">Event Dates </td>

                <td width="8%" align="center" class="tab_header1">Post Date </td>

                <td colspan="3" align="center" class="tab_header1">Action</td>

              </tr>

              

			  <?php

			

			  $link_new_ev=mysqli_query($link,$sql_new_ev);

			  while($new_ev_data=mysqli_fetch_array($link_new_ev))

			  	{

							

			  ?>

			              



              <tr class="<?php echo $class; ?>">

                <td align="center"><?php echo $new_ev_data['event_id']; ?></td>

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

                <td width="6%" align="center">

                <a href="javascript:void(0);"  name="<?php  echo $new_ev_data['event_id']; ?>" id="ln_<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="details(this.name);"><div id="ln_<?php  echo $new_ev_data['event_id']; ?>">View</div></a>                </td>

                <td width="6%" align="center"><a href="javascript:void(0);" id="<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="manage(this.id)">Manage</a></td>

                <td width="6%" align="center">

				

				

			

				<?php

				

				if(!check_prom($new_ev_data['event_id']))	

				{

				

				?>	

				

				<div id="promote_load">				

				<a href="javascript:void(0);" id="<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="promote(this.id)"> Promote</a>

				</div>

				

				<?php

				}

				else 

				{

			//echo "promoted";

				?>

				<div id="promote_load">				

				<a href="javascript:void(0);" id="<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="remove_promote(this.id)">Remove Pro</a>

				</div>

				<?php

				}

				?>

				</td>

              </tr>

			  

			    <tr>

                <td colspan="10"> <div id="det_<?php  echo $new_ev_data['event_id']; ?>"></div>                </td>

                </tr>

			 <?php

			 }

			 ?> 

              <tr>

                <td>&nbsp;</td>

                <td></td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td colspan="3">&nbsp;</td>

              </tr>

            </table>





