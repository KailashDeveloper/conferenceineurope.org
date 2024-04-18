<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php include('script.php');?>

<script language="javascript">
	/////
	////change password 
	$(function(){		   
$('#add_ad_image').submit(function(e){									
e.preventDefault();
var form=$(this);
var post_data=form.serialize();
var post_url=form.attr('action');

$('#load').html("loading");
  $.ajax({
  type:"POST",
  url:post_url,
  data:post_data,
  success:function(msg){$('#load').html(msg);}
  });

  });
  });
	

		
	
</script>


</head>

<body>


<div id="fade" class="black_overlay"></div>
        <div id="light" class="white_content">

		</div>
       


 
	

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" bgcolor="#f5f5f5" >
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="31%"><img src="images/logo.png" alt="logo" /></td>
    <td width="69%" align="right" valign="middle">
      <?php
include("top_menu.php");
?>

    </td>
  </tr>
</table>

    </td>
  </tr>
  <tr>
    <td height="461" colspan="3" align="center" valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td width="16%"  valign="top">
        <?php include('menu.php'); ?></td>
        <td width="80%" align="center" valign="top"><table width="100%" height="129" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="37" align="center" class="inner_welcome">Add Organizing society</td>
          </tr>
          
          <tr>
            <td>
			
			
			<form action="ad_so.php" method="post" name="add_ad_image" id="add_ad_image" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td colspan="5"></td>
  </tr>
  <tr>
    <td class="form_menu">Domain Name</td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="domain" type="text" id="domain" class="form_text" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Society</td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="society" type="text" id="society" class="form_text" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="15%" class="form_menu">Title </td>
    <td width="2%">&nbsp;</td>
    <td colspan="2"><label>
      <input name="title" type="text" id="title" class="form_text">
      </label></td>
    <td width="64%">&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Desc</td>
    <td>&nbsp;</td>
    <td colspan="2"><label>
    <textarea name="description" type="text" id="description" class="form_textarea" ></textarea>
    
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Youtube </td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="youtube" type="text" id="youtube" class="form_text" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Address</td>
    <td>&nbsp;</td>
    <td colspan="2"><textarea name="address" type="text" id="address" class="form_textarea" ></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Image</td>
    <td>&nbsp;</td>
    <td colspan="2">
      
      <input name="images" type="file" class="form_text" id="images" />
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
					  </script>	</td>
    <td><div class="in_error" id="response"></div></td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="6%"><label>
      <input type="image" src="images/submit.png">
      </label></td>
    <td colspan="2"><div id="load"></div></td>
  </tr>
</table>

</form>
			
			
			
			
			
			
			</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
	      <tr>
        <td valign="top">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
  <tr>
    <td height="100" colspan="3"  ><div class="copyright">Copyright &copy; 2013, All Rights Reserved, Powered By &nbsp; Conferencealerts</div></td>
  </tr>
</table>

</body>
</html>
