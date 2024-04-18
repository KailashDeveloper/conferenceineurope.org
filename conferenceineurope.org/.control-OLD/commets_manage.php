<?php

include("mysqli_dbconn.php");

 $ch_id=$_REQUEST['ch_id'];

 $email=$_REQUEST['email'];

 $date=date("Y-m-d");



$sql_ch_det=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `chat_user` WHERE `id`='$ch_id'"));



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



<form name="staus" id="staus" method="post" action="post_commet.php" onSubmit="">

<input type="hidden" name="ch_id" value="<?php echo $ch_id; ?>" />

<input type="hidden" name="email" value="<?php echo $email; ?>" />

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">

    <tbody>

      <tr>

        <td height="20" colspan="3" align="center"  class="inner_welcome">Post Chat Commets </td>

        <td width="4%" align="center"><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'" class="link"><img src="images/1369901297_dialog-close.png"  border="none" height="22" width="22" alt="close" /></a></td>

      </tr>

      

      <tr>

        <td width="28%" align="right" class="table_sub_content">Email ID  </td>

        <td align="left" width="1%">&nbsp;</td>

        <td colspan="2" align="left" class="table_content"><?php echo $sql_ch_det['email']; ?></td>

      </tr>

      <tr>

        <td class="table_sub_content" align="right">User Message </td>

        <td class="quickcontact_lebel" align="left">&nbsp;</td>

        <td colspan="2" align="left"><span class="table_content"><?php echo $sql_ch_det['msg']; ?></span></td>

      </tr>

      

      <tr>

        <td class="table_sub_content" align="right">Replied</td>

        <td class="quickcontact_lebel" align="left">&nbsp;</td>

        <td colspan="2" align="left"><label>

          <textarea name="replied" class="form_textarea" id="replied"><?php echo $sql_ch_det['replied']; ?></textarea>

        </label></td>

      </tr>

      <tr>

        <td class="quickcontact_lebel" align="right">&nbsp;</td>

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

