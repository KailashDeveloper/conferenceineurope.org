<?php
ob_start();
session_start();
if(!isset($_SESSION['ALERT_ADMIN']))
header("location:index.php");

include("mysqli_dbconn.php");
include("fun.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Pannel</title>
<script language="javascript" src="js/jquery.min.js"></script>

<script type="text/javascript">
var rev = "fwd";
function titlebar(val)
{
	var msg  = ":: Conference ALert Admin Pannel ::";
	var res = " ";
	var speed = 100;
	var pos = val;

	msg = " "+msg+" ";
	var le = msg.length;
	if(rev == "fwd"){
		if(pos < le){
		pos = pos+1;
		scroll = msg.substr(0,pos);
		document.title = scroll;
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}
		else{
		rev = "bwd";
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}
	}
	else{
		if(pos > 0){
		pos = pos-1;
		var ale = le-pos;
		scrol = msg.substr(ale,le);
		document.title = scrol;
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}
		else{
		rev = "fwd";
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}	
	}
}

titlebar(0);
</script>
<link rel="stylesheet" type="text/css" href="css/admin.css" />
<link rel="stylesheet" type="text/css" href="css/vmenu.css" />
<script type="text/javascript" src="js/menu.js"></script>
<link rel="stylesheet" type="text/css" href="css/sddm.css" >
<link rel="stylesheet" type="text/css" href="css/form.css" >

<script language="javascript">
	/////
	////change password 
	$(function(){		   
$('#pass_form').submit(function(e){									
e.preventDefault();
var form=$(this);
var post_data=form.serialize();
var post_url=form.attr('action');
 if(val_p())
 {
$('#pass_val').html("loading");
  $.ajax({
  type:"POST",
  url:post_url,
  data:post_data,
  success:function(msg){$('#pass_val').html(msg);}
  });
 }
  });
  });
	
	function val_p()
		{
						$('#p_err').html("");
						$('#con_p_err').html("");
						$('#old_pass_err').html("");						
						
						var new_pass = document.getElementById("new_pass").value
						var con_pass = document.getElementById("con_pass").value
						
						if(new_pass.length < 6)	 
						{
						$('#p_err').html("Invalid Password");
						alert("Password Length Must Be 6");
						
						document.pass_form.new_pass.focus();
						return false;
						}
						
						
						if(new_pass != con_pass)
						{
						alert('Wrong confirm password !');
						$('#con_p_err').html("Password & Confirm Password Do not  Matched");
						document.pass_form.con_pass.focus();
						return false;
						}
				return true;		
		}
		
	
</script>


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
            <td height="37" align="center" class="inner_welcome">Change Password </td>
          </tr>
          
          <tr>
            <td>
			
			
			<form action="changep.php" method="post" name="pass_form" id="pass_form">
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td colspan="5"></td>
  </tr>
  <tr>
    <td width="15%" class="form_menu">Current Password </td>
    <td width="2%">&nbsp;</td>
    <td colspan="2"><label>
      <input name="curr_pass" type="password" id="curr_pass" class="form_text">
    </label></td>
    <td width="64%"><div class="in_error" id="old_pass_err"></div></td>
  </tr>
  <tr>
    <td class="form_menu">New Password </td>
    <td>&nbsp;</td>
    <td colspan="2"><label>
    <input name="new_pass" type="password" id="new_pass" class="form_text">
    </label></td>
    <td><div class="in_error" id="p_err"></div></td>
  </tr>
  <tr>
    <td class="form_menu">Confirm Password </td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="con_pass" type="password" id="con_pass" class="form_text"></td>
    <td><div class="in_error" id="con_p_err"></div></td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="6%"><label>
      <input type="image" src="images/submit.png">
    </label></td>
    <td colspan="2"><div id="pass_val"></div></td>
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
