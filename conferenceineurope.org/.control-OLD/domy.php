<?php
ob_start();
session_start();
if(!isset($_SESSION['ALERT_ADMIN']))
header("location:index.php");

include("mysqli_dbconn.php");
include("fun.php");
$_SESSION['ev_status']="New";
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
            <td height="37" align="center" class="inner_welcome">New Event Details </td>
          </tr>
          
          <tr>
            <td>
            
            
            
                
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