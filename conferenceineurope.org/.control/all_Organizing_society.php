<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['ALERT_ADMIN']))
header("location:index.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>




<script language="javascript">
function so_manage(id)	
	{
	$.get('so_manage.php',{society_id:id},function(d){$('#light').html(d);});
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';	
	}
</script>

<?php include('script.php');?>

<?php
if(isset($_REQUEST['del_id']))
	{
	$del_id=$_REQUEST['del_id'];
	mysqli_query($link,"UPDATE `org_society` SET `status` = '0' WHERE `society_id` ='$del_id';");
	}
?>
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
            <td height="37" align="center" class="inner_welcome">New Event Details </td>
          </tr>
          
          <tr>
            <td>
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="15%" align="center" class="tab_header1">Society id</td>
                <!--<td width="6%" align="center" class="tab_header1">Event Type </td>-->
                <td width="12%" align="center" class="tab_header1">Society Name</td>
                <td width="11%" align="center" class="tab_header1">logo</td>
                <td width="18%" align="center" class="tab_header1">Title</td>
                <td width="31%" align="center" class="tab_header1">desc</td>
                <td colspan="2" align="center" class="tab_header1">Action</td>
              </tr>
              
			  <?php
			 $sql_new_ev="SELECT * FROM `org_society` where `status` ='1' ORDER BY `society_id` DESC";
			  $link_new_ev=mysqli_query($link,$sql_new_ev);
			  while($new_ev_data=mysqli_fetch_array($link_new_ev))
			  	{
								
					
					$class="";		
								
			  ?>
			              

              <tr class="<?php echo $class; ?>">
                <td align="center"><?php echo $new_ev_data['society_id']; ?></td>
               
                <td align="center">
				
				<?php echo $new_ev_data['society']; ?>
                <hr />
                <?php echo $new_ev_data['domain']; ?>
                
                </td>
                <td align="center"><img src="../society/<?php echo $new_ev_data['logo']; ?>" height="100" width="auto" /></td>
                <td align="center"><?php echo $new_ev_data['title']; ?></td>
                <td align="center"  > <div style="height:150px; overflow:scroll;"><?php echo $new_ev_data['description']; ?></div></td>
                <td width="6%" align="center"><a href="javascript:void(0);" id="<?php  echo $new_ev_data['society_id']; ?>" class="link" onclick="so_manage(this.id)">Manage</a></td>
                <td width="7%" align="center"><a href="all_Organizing_society.php?del_id=<?php  echo $new_ev_data['society_id']; ?>">Delete</a></td>
              </tr>
			  
			    <tr>
                <td colspan="8"> <div id="det_<?php  echo $new_ev_data['society_id']; ?>"></div>                </td>
                </tr>
			 <?php
			
			 }
			 ?> 
              <tr>
                <td><label></label></td>
                <td colspan="2">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="3">&nbsp;</td>
              </tr>
            </table>
            
                
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
