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

<link rel="stylesheet" type="text/css" href="css/admin.css" />
<link rel="stylesheet" type="text/css" href="css/vmenu.css" />
<script type="text/javascript" src="js/menu.js"></script>
<link rel="stylesheet" type="text/css" href="css/sddm.css" >
<link rel="stylesheet" type="text/css" href="css/form.css" >

<script>

$(document).ready(function(){

							function loading_show()
							{
							$('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast');
							}
							function loading_hide()
							{
							$('#loading').fadeOut('fast');
							}  
							
							
							
                function loadData(page)
				{					
                  loading_show();                    
                    $.ajax
                    ({
                        type: "POST",
                        url: "load_contact_events.php",
                        data: "page="+page,
                        //success: function(msg){$("#container").ajaxComplete(function(event, request, settings){/*loading_hide();*/$("#container").html(msg);});}
						success: function(msg){loading_hide();$("#container").html(msg);}
                    });
                }
                loadData(1);  // For first time page load default results
                $('#container .pagination li.active').live('click',function(){
						
                    var page = $(this).attr('p');
                    loadData(page);
                    
                });           

            });
			

function details(id)
	{
		
			if($('#ln_'+id).text()=='View')
			{				
			$('#ln_'+id).html("Hide");
			$('#ln_'+id).addClass('view_text');
			$('#det_'+id).html("<img src='images/loading.gif' width='40' height='40' />");	
			$.get("inv_ev_detail.php",{ev_id:id},function(d){$("#det_"+id).html(d)});
			}
	
				else if($('#ln_'+id).text()=='Hide')
				{
				$('#ln_'+id).text('View');
				$('#ln_'+id).addClass('hidetext');
				$('#det_'+id).html("");
				}	
				
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
            <td height="37" align="center" class="inner_welcome">Contacted Events</td>
          </tr>
          
          <tr>
            <td>
            
            <?php include("load_contact_events.php"); ?>
            
                
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
