<?php

if (session_status() == PHP_SESSION_NONE) {

    session_start();

}

?>

<link rel="stylesheet" type="text/css" href="css/pagi.css">



        <div id="loading"></div>

        <div id="container"></div>



<script language="javascript">

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

<?php

if(isset($_POST['page']))

{

$page = $_POST['page'];

$cur_page = $page;

$page -= 1;

$per_page = 10;

$previous_btn = true;

$next_btn = true;

$first_btn = true;

$last_btn = true;

$start = $page * $per_page;

include"mysqli_dbconn.php";

include("fun.php");



$ev_status=$_SESSION['ev_status'];

//$query_pag_data = "SELECT * FROM `event` WHERE `status`='$ev_status' order by `event_id` Desc LIMIT $start, $per_page";





$query_pag_data = "SELECT * FROM `event` join `org_detail` where 

(`event`.`org_id`=`org_detail`.`org_id`)

and

(`event`.`status`='$ev_status')

and

(`org_detail`.`status`='New' or `org_detail`.`org_id`<'926')

order by `event`.`event_id` Desc LIMIT $start, $per_page

";





$msg = "";

$msg1="";



$sql_new_ev=$query_pag_data;



?>





<form name="event_table" id="event_table" action="delete_event.php">



<table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="3%" align="center" class="tab_header1">

				

				<a href="javascript:void();" onclick="javascript:checkAll('event_table', true);"><img src="images/checked.png" /></a><a href="javascript:void();" onclick="javascript:checkAll('event_table', false);"></a>				</td>

                <td width="2%" align="center" class="tab_header1"><a href="javascript:void();" onclick="javascript:checkAll('event_table', false);"><img src="images/uncheck.png" /></a></td>

                <td width="9%" align="center" class="tab_header1">Event Id</td>

                <!--<td width="6%" align="center" class="tab_header1">Event Type </td>-->

                <td width="6%" align="center" class="tab_header1">Organiser</td>

                <td width="10%" align="center" class="tab_header1">Event Topic </td>

                <td width="15%" align="center" class="tab_header1">Event Name </td>

                <td width="11%" align="center" class="tab_header1">Country</td>

                <td width="8%" align="center" class="tab_header1">Website</td>

                <td width="13%" align="center" class="tab_header1">Event Dates </td>

                <td width="9%" align="center" class="tab_header1">Post Date </td>

                <td colspan="2" align="center" class="tab_header1">Action</td>

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

                <td align="center"><?php echo $new_ev_data['event_id']; ?></td>

                <!--  <td align="center"><?php  //echo event_type($new_ev_data['event_type']); ?></td>-->

                <td align="center"><?php echo  org_detail($new_ev_data['org_id']); ?></td>

                <td align="center"><?php echo  event_topic($new_ev_data['event_topic']); ?></td>

                <td align="center"><?php echo $new_ev_data['event_name']; ?></td>

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

                <td width="7%" align="center">

                <a href="javascript:void(0);"  name="<?php  echo $new_ev_data['event_id']; ?>" id="ln_<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="details(this.name);"><div id="ln_<?php  echo $new_ev_data['event_id']; ?>">View</div></a>                </td>

                <td width="7%" align="center"><a href="javascript:void(0);" id="<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="manage(this.id)">Manage</a></td>

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



<br />





<?php

    //$msg1 .= "<li><b>" . $row['msg_id'] . "</b> " . $htmlmsg . "</li>";



$msg1 = "<div class='data'><ul>" . $msg1 . "</ul></div>"; // Content for Data





/* --------------------------------------------- */

//$query_pag_num = "SELECT COUNT(*) AS count FROM event WHERE `status`='$ev_status'";

 $query_pag_num ="SELECT COUNT(`event`.`event_id`) FROM `event` join `org_detail` where 

(`event`.`org_id`=`org_detail`.`org_id`)

and

(`event`.`status`='New')

and

(`org_detail`.`status`='New' or `org_detail`.`org_id`<'926')";







$result_pag_num = mysqli_query($link,$query_pag_num);

$row = mysqli_fetch_array($result_pag_num);

//print_r($row);



$count = $row[0];





$no_of_paginations = ceil($count / $per_page);



/* ---------------Calculating the starting and endign values for the loop----------------------------------- */

if ($cur_page >= 7) {

    $start_loop = $cur_page - 3;

    if ($no_of_paginations > $cur_page + 3)

        $end_loop = $cur_page + 3;

    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {

        $start_loop = $no_of_paginations - 6;

        $end_loop = $no_of_paginations;

    } else {

        $end_loop = $no_of_paginations;

    }

} else {

    $start_loop = 1;

    if ($no_of_paginations > 7)

        $end_loop = 7;

    else

        $end_loop = $no_of_paginations;

}

/* ----------------------------------------------------------------------------------------------------------- */

$msg .= "<div class='pagination'><ul>";



// FOR ENABLING THE FIRST BUTTON

if ($first_btn && $cur_page > 1) {

    $msg .= "<li p='1' class='active'>First</li>";

} else if ($first_btn) {

    $msg .= "<li p='1' class='inactive'>First</li>";

}



// FOR ENABLING THE PREVIOUS BUTTON

if ($previous_btn && $cur_page > 1) {

    $pre = $cur_page - 1;

    $msg .= "<li p='$pre' class='active'>Previous</li>";

} else if ($previous_btn) {

    $msg .= "<li class='inactive'>Previous</li>";

}

for ($i = $start_loop; $i <= $end_loop; $i++) {



    if ($cur_page == $i)

        $msg .= "<li p='$i'  class='active selected'>{$i}</li>";

    else

        $msg .= "<li p='$i' class='active'>{$i}</li>";

}



// TO ENABLE THE NEXT BUTTON

if ($next_btn && $cur_page < $no_of_paginations) {

    $nex = $cur_page + 1;

    $msg .= "<li p='$nex' class='active'>Next</li>";

} else if ($next_btn) {

    $msg .= "<li class='inactive'>Next</li>";

}



// TO ENABLE THE END BUTTON

if ($last_btn && $cur_page < $no_of_paginations) {

    $msg .= "<li p='$no_of_paginations' class='active'>Last</li>";

} else if ($last_btn) {

    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";

}

//$goto = "<input type='text' class='goto' /><input type='button' id='go_btn' class='go_button' value='Go'/>";

$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";

$msg = $msg . "</ul>" . "</div>";  // Content for pagination

echo $msg1."<hr>";

echo $msg."<br>";

$goto="";

echo  $goto ."&nbsp;&nbsp;". $total_string ;



}



?>



