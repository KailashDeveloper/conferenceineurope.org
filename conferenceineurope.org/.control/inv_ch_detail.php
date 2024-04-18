<?php

if(!isset($link))

include("mysqli_dbconn.php");

include("fun.php");

$ch_id=$_REQUEST['ch_id'];

//echo "SELECT * FROM `chat` WHERE `from`='$ch_id' OR 'to'='$ch_id'";

$dd_link=mysqli_query($link,"SELECT * FROM `chat` WHERE `from`='$ch_id' OR `to`='$ch_id'");



?>

<link rel="stylesheet" type="text/css" href="css/form.css" />



<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" class="tab">

  <tr>

    <td colspan="4" align="center">&nbsp;</td>

  </tr>

  

  <tr>

    <td>&nbsp;</td>

    <td colspan="3">&nbsp;</td>

  </tr>

  <tr>

    <td width="13%">&nbsp;</td>

    <td colspan="3">

	<fieldset class="fld_set">

<legend class="leg_hed">&nbsp;&nbsp;Chat Detail &nbsp;&nbsp;&nbsp;</legend>

	<table width="100%" border="0" cellspacing="2" cellpadding="0">

      

      <tr bgcolor="#FFFFFF" class="tab">

        <td width="6%">&nbsp;</td>

        <td width="94%" class="table_content">&nbsp;</td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td>&nbsp;</td>

        <td class="table_content" >

		

		<?php

		while($data=mysqli_fetch_array($dd_link))	

		{

		?>

		<span style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#0066FF; font-weight:normal;" >

		<?php		echo  "<b>". $data['from']. " - " . $data['to'] ."</b><br>";?>

		</span>

		

		

		<span style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666666; font-weight:normal;" >

		<?php 		echo $data['message']."<br>"; ?>

		</span>

		

		<?php

		}

		?>

		

		</td>

      </tr>

    </table>

	</fieldset>	</td>

  </tr>

  

  <tr>

    <td>&nbsp;</td>

    <td width="20%">&nbsp;</td>

    <td width="1%">&nbsp;</td>

    <td width="66%">&nbsp;</td>

  </tr>

</table>

