<?php

session_start();

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

$per_page = 15;

$previous_btn = true;

$next_btn = true;

$first_btn = true;

$last_btn = true;

$start = $page * $per_page;

include"mysqli_dbconn.php";

include("fun.php");



$ev_status=$_SESSION['ev_status'];;

$query_pag_data = "SELECT * FROM `chat_user`  ORDER BY `id` DESC LIMIT $start, $per_page";

$result_pag_data = mysqli_query($link,$query_pag_data) or die('MySql Error' . mysqli_error($link));

$msg = "";

$msg1="";



$sql_new_ev=$query_pag_data;



?>









<table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="10%" align="center" class="tab_header1"> Id</td>

                <td width="15%" align="center" class="tab_header1">Full Name </td>

                <td width="14%" align="center" class="tab_header1">Email </td>

                <td width="13%" align="center" class="tab_header1">Date</td>

                <td width="23%" align="center" class="tab_header1">Message</td>

                <td align="center" class="tab_header1">Status</td>

                <td colspan="2" align="center" class="tab_header1">Action</td>

              </tr>

              

			  <?php

			  $j=0;

			 // $sql_new_ev="SELECT * FROM `event` WHERE `status`='pending' order by `event_id` Asc";

			  $link_new_ev=mysqli_query($link,$sql_new_ev);

			  while($new_chat_user_data=mysqli_fetch_array($link_new_ev))

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

								

								if($new_chat_user_data['replied']!="")

									{

									$class='tab_bg3';

									}

								

			  ?>

			              



              <tr class="<?php echo $class; ?>" style="padding:5px;">

                <td height="29" align="center"><?php echo $new_chat_user_data['id']; ?></td>

                <td align="center"><?php echo  $new_chat_user_data['fullname']; ?></td>

                <td align="center"><?php echo $new_chat_user_data['email']; ?></td>

                <td align="center"><?php echo $new_chat_user_data['date']; ?></td>

                <td align="center"><?php echo $new_chat_user_data['msg']; ?></td>

                <td width="11%" align="center"><?php echo $new_chat_user_data['status']; ?></td>

                <td width="7%" align="center">



				<a href="javascript:void(0);"  name="<?php  echo $new_chat_user_data['id']; ?>" id="ln_<?php  echo $new_chat_user_data['id']; ?>" class="link" onclick="details(this.name);"><div id="ln_<?php  echo $new_chat_user_data['id']; ?>">View</div></a>				</td>

                <td width="7%" align="center">

				<a href="javascript:void(0);" class="link" id="<?php  echo $new_chat_user_data['id']; ?>"  name="<?php echo $new_chat_user_data['email']; ?>"onclick="chat_commets(this.id,this.name);">Commet</a></td>

              </tr>

			  

			    <tr>

                <td colspan="8"> <div id="det_<?php  echo $new_chat_user_data['id']; ?>"></div>                </td>

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

                <td colspan="3">&nbsp;</td>

              </tr>

            </table>





<br />





<?php

    //$msg1 .= "<li><b>" . $row['msg_id'] . "</b> " . $htmlmsg . "</li>";



$msg1 = "<div class='data'><ul>" . $msg1 . "</ul></div>"; // Content for Data





/* --------------------------------------------- */

$query_pag_num = "SELECT COUNT(*) AS count FROM `chat_user`  ";

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



