<?php

include("mysqli_dbconn.php");

 $ev_id_list=$_REQUEST['ev_id_list'];

 $t_ev_id_list=explode("#",$ev_id_list);



for($o=1;$o<sizeof($t_ev_id_list);$o++)

	{

	$ext_ev_id= $t_ev_id_list[$o];

	//$sql_ev_inv1=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `event` WHERE `event_id`='$ev_id'"));

	}

$date=date("Y-m-d");



//$org_inv_id1=$sql_ev_inv1['org_id'];

//$sql_ev_org_det1=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_id`='$org_inv_id1'"));



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



<form name="staus" id="staus" method="post" action="up_status_multiple.php" onSubmit="">

<input type="hidden" name="ev_id_list" value="<?php echo $ev_id_list; ?>" />

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">

    <tbody>

      <tr>

        <td height="20" colspan="3" align="center"  class="inner_welcome">Manage Events </td>

        <td width="4%" align="center"><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'" class="link"><img src="images/1369901297_dialog-close.png"  border="none" height="22" width="22" alt="close" /></a></td>

      </tr>

      <tr>

        <td height="32" colspan="4" align="center">&nbsp;</td>

      </tr>

      

      <tr>

        <td width="28%" align="right" class="table_sub_content">Event Id </td>

        <td width="1%" align="left">&nbsp;</td>

        <td colspan="2" align="left" class="table_content">&nbsp;</td>

      </tr>

      <tr>

        <td colspan="4" align="left" class="table_sub_content"><span class="table_content">

		

		<div  style="font-size:11px;  width:550px;  overflow:scroll; height:auto;">

		<?php echo $ev_id_list; ?>

		</div>

		

		</span></td> 

      </tr>

      <tr>

        <td class="table_sub_content" align="right">Status</td>

        <td class="quickcontact_lebel" align="left">&nbsp;</td>

        <td colspan="2" align="left"><label>

          <select name="status" class="form_list" id="status">

		    <option value="Pending"  >Pending</option>

            <option value="Accept" >Accept</option>

            <option value="Temporary Reject"  >Temporary Reject</option>

            <option value="Permanent Reject"  >Permanent Reject</option>

			 <option value="Hide"  >Hide This Event</option>

          </select>

        </label></td>

      </tr>

      <tr>

        <td class="table_sub_content" align="right">Reason Rejected </td>

        <td class="quickcontact_lebel" align="left">&nbsp;</td>

        <td colspan="2" align="left"><label>

          <textarea name="reason" class="form_textarea" id="reason"></textarea>

        </label></td>

      </tr>

      <tr>

        <td class="quickcontact_lebel" align="right">				</td>

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

