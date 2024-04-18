<?php

include("mysqli_dbconn.php");

 $ev_id=$_REQUEST['ev_id'];

$date=date("Y-m-d");

if(isset($_REQUEST['status']) )

{

	

/*echo "<script>document.getElementById('light').style.visibility='hidden';</script>";

echo "<script>document.getElementById('fade').style.visibility='hidden';</script>";*/

						

}

$sql_ev_inv1=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `event` WHERE `event_id`='$ev_id'"));

$org_inv_id1=$sql_ev_inv1['org_id'];

$sql_ev_org_det1=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_id`='$org_inv_id1'"));



?>





<script language="javascript">

$(function(){



$('#staus').submit(function(e){

							

e.preventDefault();

var form = $(this);

var post_url=form.attr('action');

var post_data=form.serialize();

$('#test_status').html("Loading Please Wait");

$.ajax({

type:'POST',

url:post_url,

data:post_data,

success:function(msg){$('#test_status').html(msg);}

});

});

});



</script>



<form name="staus" id="staus" method="post" action="up_status.php" onSubmit="">

<input type="hidden" name="ev_id" value="<?php echo $ev_id; ?>" />

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">

    <tbody>

      <tr>

        <td height="20" colspan="3" align="center"  class="inner_welcome">Manage Events </td>

        <td width="4%" align="center"><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'" class="link"><img src="images/1369901297_dialog-close.png"  border="none" height="22" width="22" alt="close" /></a></td>

      </tr>

      <tr>

        <td height="32" colspan="4" align="center"><strong class="form_heading">Status</strong>&nbsp;&nbsp;&nbsp;<span class="domain"><?php echo $status= $sql_ev_inv1['status']; ?></span></td>

      </tr>

      <tr>

        <td align="right" class="table_sub_content">Organizer Name </td>

        <td align="left">&nbsp;</td>

        <td colspan="2" align="left" class="table_content"><?php echo $sql_ev_org_det1['contact_person_name']; ?></td>

      </tr>

      <tr>

        <td align="right" class="table_sub_content">Organization Name </td>

        <td align="left">&nbsp;</td>

        <td colspan="2" align="left" class="table_content"><?php echo $sql_ev_org_det1['orginisation_name']; ?></td>

      </tr>

      <tr>

        <td align="right" class="table_sub_content">&nbsp;</td>

        <td align="left">&nbsp;</td>

        <td colspan="2" align="left" class="table_content">

		

		

		</td>

      </tr>

      <tr>

        <td align="right" class="table_sub_content">Event Id </td>

        <td align="left">&nbsp;</td>

        <td colspan="2" align="left" class="table_content"><?php echo $sql_ev_inv1['event_id']; ?></td>

      </tr>

      <tr>

        <td width="28%" align="right" class="table_sub_content">Event Name </td>

        <td align="left" width="1%">&nbsp;</td>

        <td colspan="2" align="left" class="table_content"><?php echo $sql_ev_inv1['event_name']; ?></td>

      </tr>

      <tr>

        <td class="table_sub_content" align="right">Status</td>

        <td class="quickcontact_lebel" align="left">&nbsp;</td>

        <td colspan="2" align="left"><label>

          <select name="status" class="form_list" id="status">

		    <option value="Pending"  <?php if($status=="Pending" || $status=="New" ) echo  "selected='selected'";?> >Pending</option>

            <option value="Accept" <?php if($status=="Accept") echo  "selected='selected'";?> >Accept</option>

            <option value="Temporary Reject" <?php if($status=="Temporary Reject") echo  "selected='selected'";?> >Temporary Reject</option>

            <option value="Permanent Reject" <?php if($status=="Permanent Reject") echo  "selected='selected'";?> >Permanent Reject</option>

			 <option value="Hide" <?php if($status=="Hide") echo  "selected='selected'";?> >Hide This Event</option>

          </select>

        </label></td>

      </tr>

      <tr>

        <td class="table_sub_content" align="right">Reason Rejected </td>

        <td class="quickcontact_lebel" align="left">&nbsp;</td>

        <td colspan="2" align="left"><label>

          <textarea name="reason" class="form_textarea" id="reason"><?php echo $sql_ev_inv1['reason']; ?></textarea>

        </label></td>

      </tr>

      <tr>

        <td class="quickcontact_lebel" align="right">

		

		<input type="hidden" name="org_mail" value="<?php echo $sql_ev_org_det1['org_mail']; ?>" />

        <input type="hidden" name="contact_person_name" value="<?php echo $sql_ev_org_det1['contact_person_name']; ?>" />

		<input type="hidden" name="orginisation_name" value="<?php echo $sql_ev_org_det1['orginisation_name']; ?>" />

		

		<input type="hidden" name="event_id" value="<?php echo $sql_ev_inv1['event_id']; ?>" />

		<input type="hidden" name="event_name" value="<?php echo $sql_ev_inv1['event_name']; ?>" />

		<input type="hidden" name="event_enq_email" value="<?php echo $sql_ev_inv1['event_enq_email']; ?>" />

		<input type="hidden" name="org_society" value="<?php echo $sql_ev_inv1['org_society']; ?>" />

		

		

		

		

		

		</td>

        <td class="quickcontact_lebel" align="left">&nbsp;</td>

        <td colspan="2" align="left"><label>

          <input name="Submit" type="submit" class="form_submit" value="Submit" />

        </label></td>

      </tr>

      

      <tr>

        <td height="20" colspan="4" align="center"><div id="test_status"></div></td>

      </tr>

    </tbody>

  </table>

</form>

