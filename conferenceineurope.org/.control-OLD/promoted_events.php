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

<script type="text/javascript">
function checkAll(formname, checktoggle)
{
     var checkboxes = new Array();
      checkboxes = document[formname].getElementsByTagName('input');
      for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].type === 'checkbox') {
               checkboxes[i].checked = checktoggle;
          }
      }
}

$(function(){
		   
$('#event_table').submit(function(e){	
							
e.preventDefault();
var form=$(this);
var post_data=form.serialize();
var post_url=form.attr('action');
$('#container').html("loading");

if(confirm("Sure want to detete"))
			{
  $.ajax({
  type:"POST",
  url:post_url,
  data:post_data,
  success:function(msg){$('#container').html(msg);}
  });
  }
  });
  });



$('#save_value').click(function(){
var ev_id_list="";
    $('.ads_Checkbox:checked').each(function(){
         //alert($(this).val());
		 ev_id_list=ev_id_list+"#"+$(this).val();
    });
	//alert(ev_id_list);
	$.get('manage_multiple.php',{ev_id_list:ev_id_list},function(d){$('#light').html(d);});
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';	
});

</script>


<script language="javascript">



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
                        url: "load_promoted_event.php",
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
</script>

<script language="javascript">
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
	
	function manage(id)	
	{
	$.get('manage.php',{ev_id:id},function(d){$('#light').html(d);});
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';	
	}
	
	function promote(id)
		{
			
 	$.get('manage_promote.php',{ev_id:id},function(d){$('#light').html(d);});
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';		
	
	//	$.get('row_promote.php',{prom_id:id},function(d){$('#promote_load').html(d);})	;
		
		
		}
		
	 function remove_promote(id)
		{
		$.get('row_promote_remove.php',{prom_id:id},function(d){$('#promote_load').html(d);})	;
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
            <td height="37" align="center" class="inner_welcome">Promoted Events </td>
          </tr>
          
          <tr>
            <td>
            
            
			
			
<!--          ///////////////////////////////               -->			

<?php include("load_promoted_event.php"); ?>

<!-- ///////////////////////////////////////////// -->













			
			
			
			
			
			
			
			
			
			
			
            
                
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
