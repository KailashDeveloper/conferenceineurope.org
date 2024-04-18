<?php
include("mysqli_dbconn.php");
 $society_id=$_REQUEST['society_id'];
$date=date("Y-m-d");
if(isset($_REQUEST['status']) )
{
	
/*echo "<script>document.getElementById('light').style.visibility='hidden';</script>";
echo "<script>document.getElementById('fade').style.visibility='hidden';</script>";*/
						
}
$sql_associates_ass=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `org_society` WHERE `society_id`='$society_id'"));

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

<form name="staus" id="staus" method="post" action="ed_so.php" onSubmit="">
<input type="hidden" name="society_id" value="<?php echo $society_id; ?>" />
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tbody>
      <tr>
        <td height="20" colspan="4" align="center"  class="inner_welcome">Society Manage</td>
        <td width="5%" align="center"><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'" class="link"><img src="images/1369901297_dialog-close.png"  border="none" height="22" width="22" alt="close" /></a></td>
      </tr>
      
      <tr>
        <td align="right" class="table_sub_content">society_id</td>
        <td align="left">&nbsp;</td>
        <td colspan="3" align="left" class="table_content"><?php echo $sql_associates_ass['society_id']; ?></td>
      </tr>
      <tr>
        <td align="right" class="table_sub_content">Society </td>
        <td align="left">&nbsp;</td>
        <td align="left" class="table_content">
        <input name="society" type="text" id="society" class="form_text"  value="<?php echo $sql_associates_ass['society']; ?>"/></td>
        <td width="19%" rowspan="3" align="left" class="table_content"><img src="../society/<?php echo $sql_associates_ass['logo']; ?>" height="80" width="auto" /></td>
        <td align="left" class="table_content">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" class="table_sub_content">Doman </td>
        <td align="left">&nbsp;</td>
        <td align="left" class="table_content"><input name="domain" type="text" id="domain" class="form_text"  value="<?php echo $sql_associates_ass['domain']; ?>"/></td>
        <td align="left" class="table_content">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" class="table_sub_content">&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td width="48%" align="left" class="table_content">
          
          <input name="images" type="file" class="form_text" id="images" />
          <input type="hidden" name="h_logo" id="h_logo" value="<?php echo $sql_associates_ass['logo']; ?>" />
          
          <script language="JavaScript" type="text/javascript">
					  (function () {
	var input = document.getElementById("images"), 
		formdata = false;
		
		
	if (window.FormData) {
  		formdata = new FormData();
  		
	}
	
	input.addEventListener("change", function (evt)
		  { 	
		  $('#response').html('<img src="loader.gif" />  Uploading Please Wait...');		
			file = this.files[0];	
			formdata.append("images", file);
		
		
	if (formdata) {
			$.ajax({
				url: "upload_so.php",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function (res) {
				document.getElementById("response").innerHTML = res; 
				}
			});
		}
	}, false);
}());
					  </script>	
          <br />
  <div class="in_error" id="response"></div>        </td>
        <td align="left" class="table_content">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" class="table_sub_content">Title</td>
        <td align="left">&nbsp;</td>
        <td colspan="3" align="left" class="table_content">
        <input name="title" type="text" id="title" class="form_text" value="<?php echo $sql_associates_ass['title']; ?>" /></td>
      </tr>
      <tr>
        <td width="27%" align="right" class="table_sub_content">Description</td>
        <td align="left" width="1%">&nbsp;</td>
        <td colspan="3" align="left" class="table_content">
        <textarea name="description" type="text" id="description" class="form_textarea" ><?php echo $sql_associates_ass['description']; ?></textarea></td>
      </tr>
      
      <tr>
        <td class="quickcontact_lebel" align="right">Youtube</td>
        <td class="quickcontact_lebel" align="left">&nbsp;</td>
        <td colspan="3" align="left"><input name="youtube" type="text" id="youtube" class="form_text"  value="<?php echo $sql_associates_ass['youtube']; ?>"/></td>
      </tr>
      <tr>
        <td class="quickcontact_lebel" align="right">Address</td>
        <td class="quickcontact_lebel" align="left">&nbsp;</td>
        <td colspan="3" align="left"><textarea name="address" type="text" id="address" class="form_textarea" ><?php echo $sql_associates_ass['address']; ?></textarea></td>
      </tr>
      <tr>
        <td class="quickcontact_lebel" align="right">&nbsp;</td>
        <td class="quickcontact_lebel" align="left">&nbsp;</td>
        <td colspan="3" align="left"><label>
          <input name="Submit" type="submit" class="form_submit" value="Submit" />
        </label></td>
      </tr>
      
      <tr>
        <td height="20" colspan="5" align="center"><div id="test_status"></div></td>
      </tr>
    </tbody>
  </table>
</form>
