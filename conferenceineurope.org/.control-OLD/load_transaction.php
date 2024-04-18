<?php

if (session_status() == PHP_SESSION_NONE) {

    session_start();

}

?>

<link rel="stylesheet" type="text/css" href="css/pagi.css">



        <div id="loading"></div>

        <div id="container"></div>







<?php

if($_POST['page'])

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



$ev_status=$_SESSION['ev_status'];;

$query_pag_data = "SELECT * FROM `transaction` ORDER BY `transaction_id` DESC LIMIT $start, $per_page ";

$result_pag_data = mysqli_query($link,$query_pag_data) or die('MySql Error' . mysqli_error($link));

$msg = "";

$msg1="";



$sql_new_ev=$query_pag_data;

$j='';

?>









<table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="10%" align="center" class="tab_header1">Trans Id </td>

                <!--<td width="6%" align="center" class="tab_header1">Event Type </td>-->

                <td width="11%" align="center" class="tab_header1">Event Id</td>

                <td width="11%" align="center" class="tab_header1">Transaction Type </td>

                <td width="10%" align="center" class="tab_header1">Payment By </td>

                <td width="16%" align="center" class="tab_header1">Ammount</td>

                <td width="15%" align="center" class="tab_header1">Transaction Date </td>

                <td width="8%" align="center" class="tab_header1">Status</td>

                <td colspan="2" align="center" class="tab_header1">Action</td>

              </tr>

              

			  <?php

			 // $sql_new_ev="SELECT * FROM `event` WHERE `status`='pending' order by `event_id` Asc";

			  $link_new_ev=mysqli_query($link,$sql_new_ev);

			  while($new_tr_data=mysqli_fetch_array($link_new_ev))

			  	{

				

				$req_id=$new_tr_data['request_id'];

				$sql_ttt=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `all_payment` WHERE `all_payment_id`='$req_id'"));

				

				

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

			              



              <tr class="<?php echo $class; ?>" height="30px;">

                <td align="center"><?php echo $new_tr_data['transaction_id']; ?></td>

              <!--  <td align="center"><?php  //echo event_type($new_tr_data['event_type']); ?></td>-->

                <td align="center"><?php echo $sql_ttt['event_id']; ?></td>

                <td align="center"><?php echo $new_tr_data['transaction_for']; ?></td>

                <td align="center" style="min-width:300px;"><?php echo  $sql_ttt['email']; ?></td>

                <td align="center" class="proc_heading"><?php 	echo $new_tr_data['amount']."$"; ?> 

				 

				 

			    </td>

                <td align="center"><span class="dt">

                  <?php 

				

				echo date('d.M.Y', strtotime($sql_ttt['date']));

				

				

				 ?>

                </span></td>

                <td align="center">	

				<span  <?php if($new_tr_data['status']=='Success'){ echo "class='proc_heading'"; } ?> >

                  <?php 				

				echo $new_tr_data['status'];

				 ?>

                </span></td>

                <td width="9%" align="center">

				

				<a href="javascript:void(0);"  name="<?php  echo $sql_ttt['event_id']; ?>" id="ln_<?php  echo $new_tr_data['transaction_id']; ?>" class="link" onclick="new_details(this.name,'<?php echo $new_tr_data['transaction_id'];  ?>');"><div id="ln_<?php  echo $new_tr_data['transaction_id']; ?>">View</div></a>

				

				

				

				</td>

                <td width="10%" align="center">

				

<!--				<a href="javascript:void(0);" id="<?php  echo $new_tr_data['transaction_id']; ?>" class="link" onclick="manage(this.id)">Manage</a>

-->				

				

				

				</td>

              </tr>

			  

			    <tr>

                <td colspan="10"> <div id="det_<?php  echo $new_tr_data['transaction_id']; ?>"></div>                </td>

                </tr>

			 <?php

			

			 }

			 ?> 

              <tr>

                <td>&nbsp;</td>

                <td></td>

                <td colspan="2">&nbsp;</td>

                <td>&nbsp;</td>

                <td colspan="2">&nbsp;</td>

                <td>&nbsp;</td>

                <td colspan="2">&nbsp;</td>

              </tr>

            </table>





<br />





<?php

    //$msg1 .= "<li><b>" . $row['msg_id'] . "</b> " . $htmlmsg . "</li>";



$msg1 = "<div class='data'><ul>" . $msg1 . "</ul></div>"; // Content for Data





/* --------------------------------------------- */

$query_pag_num = "SELECT COUNT(*) AS count FROM transaction";

$result_pag_num = mysqli_query($link,$query_pag_num);

$row = mysqli_fetch_array($result_pag_num);

$count = $row['count'];

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

echo  $goto ."&nbsp;&nbsp;". $total_string ;



}



?>



