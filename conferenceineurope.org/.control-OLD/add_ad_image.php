<?php
include("mysqli_dbconn.php");
include("fun.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Pannel</title>
<script language="javascript" src="js/jquery.min.js"></script>


<link rel="stylesheet" type="text/css" href="css/admin.css" />
<link rel="stylesheet" type="text/css" href="css/vmenu.css" />
<script type="text/javascript" src="js/menu.js"></script>
<link rel="stylesheet" type="text/css" href="css/sddm.css" >
<link rel="stylesheet" type="text/css" href="css/form.css" >

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

<script src="calender/js/calendar_eu.js" language="javascript" type="text/javascript"></script>
<link href="calender/css/calendar.css" rel="stylesheet" type="text/css" />

</head>

<body>


<div id="fade" class="black_overlay"></div>
        <div id="light" class="white_content">

		</div>
       


 
	

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" bgcolor="#f5f5f5" background="images/header-bg.jpg">
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
            <td height="37" align="center" class="inner_welcome">Add Ad Images </td>
          </tr>
          
          <tr>
            <td>
			
			
			<form action="ad_im.php" method="post" name="add_ad_image" id="add_ad_image" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td colspan="5"></td>
  </tr>
  <tr>
    <td class="form_menu">Add Type </td>
    <td>&nbsp;</td>
    <td colspan="2">
      <input name="ad_type" type="radio" value="Left" />
    Left Add Image(190*xxx)<br />
    
    <input name="ad_type" type="radio" value="Top" /> 
    Top Header Image (235*156)<br />
	<input name="ad_type" type="radio" value="FR_RIGHT" /> 
    Front Right (235*156)<br />	
<br />
</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Country</td>
    <td>&nbsp;</td>
    <td colspan="2">
    
    <select name="country" class="form_text" id="country" required="required"> 

                                <option  value="0">Choose Country</option>

                                <?php

                                $sql_con=mysqli_query($link,"SELECT * FROM `country` ORDER BY `country` ASC");

                                while($con_data=mysqli_fetch_array($sql_con))

                                {

                                ?>

                                <option  value="<?php echo $con_data['country']; ?>"><?php echo $con_data['country']; ?></option>

                                <?php

                                }

                                ?>

                                </select>
    
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="15%" class="form_menu">Heading </td>
    <td width="2%">&nbsp;</td>
    <td colspan="2"><label>
      <input name="heading" type="text" id="heading" class="form_text" required="required">
    </label></td>
    <td width="64%">&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Url</td>
    <td>&nbsp;</td>
    <td colspan="2"><label>
    <input name="url" type="text" id="url" class="form_text" required="required">
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Expire Date</td>
    <td>&nbsp;</td>
    <td colspan="2">
    
    <input name="expire_date" type="text" id="expire_date" class="form_text"      onkeypress="return false;"  required />    
    
	
	<script language="JavaScript" type="text/javascript">
new tcal ({
// form name
'formname': 'add_ad_image',
// input name
'controlname': 'expire_date'
});
</script>



    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Image</td>
    <td>&nbsp;</td>
    <td colspan="2">
	
	        <input name="images" type="file" class="form_text" id="images" />
		<script language="javascript" src="js/jquery.min.js"></script>
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
				url: "upload.php",
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
    <td height="100" colspan="3"  background="images/header-bg.jpg"><div class="copyright">Copyright &copy; 2013, All Rights Reserved, Powered By &nbsp; Conferencealerts</div></td>
  </tr>
</table>

</body>
</html>
