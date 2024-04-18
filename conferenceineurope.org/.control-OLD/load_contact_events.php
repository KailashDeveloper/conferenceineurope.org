<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<link rel="stylesheet" type="text/css" href="css/pagi.css">
<div id="loading"></div>
        <div id="container"></div>


<?php
if(isset($_POST['page']))
{
$page = $_POST['page'];
$cur_page = $page;
$page -= 1;
$per_page = 50;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
include"mysqli_dbconn.php";
include("fun.php");



$query_pag_data = "SELECT * FROM `contact_ev` ORDER BY `contact_ev_id` DESC LIMIT $start, $per_page";
$result_pag_data = mysqli_query($link,$query_pag_data) or die('MySql Error' . mysqli_error($link));
$msg = "";
$msg1="";
$sql_new_ev=$query_pag_data;
?>


<div id="del_ld"></div>



<form name="event_table" id="event_table" action="delete_event.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">        
      <tr>

                <td width="2%" align="center" class="tab_header1">
				

				<a href="javascript:void();" onclick="javascript:checkAll('event_table', true);"><img src="images/checked.png" /></a><a href="javascript:void();" onclick="javascript:checkAll('event_table', false);"></a>				</td>

                <td width="3%" align="center" class="tab_header1"><a href="javascript:void();" onclick="javascript:checkAll('event_table', false);"><img src="images/uncheck.png" /></a></td>

                <td width="9%" align="center" class="tab_header1">Event Id</td>
                <td width="14%" align="center" class="tab_header1">Event Name /Place</td>

                <!--<td width="6%" align="center" class="tab_header1">Event Type </td>-->

                <td width="14%" align="center" class="tab_header1">Host Url</td>

                <td width="29%" align="center" class="tab_header1">Sub/MSG</td>

                <td width="13%" align="center" class="tab_header1">Enquiry Emailid</td>

                <td width="7%" align="center" class="tab_header1">Post Date </td>

                <td colspan="2" align="center" class="tab_header1">Action</td>

              </tr>

              

			  <?php

			   $i=0;

			 // $sql_new_ev="SELECT * FROM `event` WHERE `status`='pending' order by `event_id` Asc";

			  $link_new_ev=mysqli_query($link,$sql_new_ev);
			  while($new_ev_data=mysqli_fetch_array($link_new_ev))
			  	{
				extract($new_ev_data);			

				//print_r($new_ev_data);

				$event_id =str_replace("ACA","",$event_id);
				
					$host_url = "https://<?php echo $_SERVER['HTTP_HOST']; ?>/event-detail.html?ev_id=$event_id";			

					

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

                <td align="center"><?php echo $event_id; ?></td>
                <td align="center"><?php echo $event_name; ?>
				<hr>
				<?php echo $place; ?>
				<hr>				<span style="font-size:12px"><?php echo $conf_date; ?></span></td>

         
                <td align="center"  ><a href="<?php echo $host_url; ?>" target="_blank"><?php echo $host_url; ?></a></td>

                <td align="center" style="font-size:12px">
				
				<?php echo $subject; ?>
                  <hr>
                <?php echo $msg; ?></td>

                <td align="center" class="dt">
				
				<?php echo $name; ?>
                <hr>
                <?php echo $event_enq_email; ?>
                
               
                
                <hr>
                <?php echo $phone; ?></td>

                <td align="center"><span class="dt">

                  <?php 

				

				echo $post_date;

				

				

				 ?>

                </span></td>

                <td width="4%" align="center">

                <!--<a href="javascript:void(0);"  name="<?php  echo $new_ev_data['event_id']; ?>" id="ln_<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="details(this.name);"><div id="ln_<?php  echo $new_ev_data['event_id']; ?>">View</div></a>-->                </td>

                <td width="5%" align="center">
                <!--<a href="javascript:void(0);" id="<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="manage(this.id)">Manage</a>--></td>

              </tr>

			  

			    <tr>

                <td colspan="11"> <div id="det_<?php  echo $new_ev_data['event_id']; ?>"></div>                </td>

                </tr>

			 <?php

			 }

			

			 ?> 

              <tr>

                <td colspan="3"><label>

                  <input name="Delete" type="submit" id="Delete" value="Delete Events" />

                </label></td>

                <td><input type="button" id="save_value" name="save_value" value="Manage Events" /></td>

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

 $query_pag_num ="SELECT * FROM `contact_ev` ORDER BY `contact_ev_id` DESC";







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



