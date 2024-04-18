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




<?php 
include("mysqli_dbconn.php");

include("fun.php");



?>

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


function save_value()
{

var ev_id_list="";
    $('.ads_Checkbox:checked').each(function(){
         //alert($(this).val());
		 ev_id_list=ev_id_list+"#"+$(this).val();
    });
	
	$.get('disable_multiple.php',{ev_id_list:ev_id_list},function(d){$('#light').html(d);});
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';	
}

</script>
<div id="del_ld"></div>
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
            



<?php
$query_pag_data = "SELECT event_id, event_stat,web_url, COUNT(*) AS dupes FROM event where event_stat >now()  GROUP BY web_url HAVING (COUNT(*) > 1) ORDER BY `dupes` DESC limit 0,50";


$result_pag_data = mysqli_query($link,$query_pag_data) or die('MySql Error' . mysqli_error());
$sql_new_ev=$query_pag_data;

?>



<form name="event_table" id="event_table" action="delete_event.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="8%" align="center" class="tab_header1">Event Id</td>
                <td width="38%" align="center" class="tab_header1">Website</td>
                <td width="32%" align="center" class="tab_header1">Event Dates </td>
                <td width="4%" align="center" class="tab_header1">Duplicate</td>
                <td colspan="2" align="center" class="tab_header1">Action</td>
              </tr>
              
			  <?php
			  $link_new_ev=mysqli_query($link,$sql_new_ev);
			  while($new_ev_data=mysqli_fetch_array($link_new_ev))
			  	{
								
						
								
			  ?>
			              

              <tr class="<?php echo $class; ?>">
                <td align="center"><?php echo $new_ev_data['event_id']; ?></td>
                <td align="left" style="font-size:12px">
				
				<?php echo $web_url= $new_ev_data['web_url']; ?>
                
              
              
              
              
                </td>
                <td align="center" class="dt"><?php 
				
				echo date('d.M.Y', strtotime($new_ev_data['event_stat']));
				
				
				 ?></td>
                <td align="center" class="dt"><?php echo $new_ev_data['dupes']; ?>&nbsp;</td>
                <td colspan="2" align="center">
                <a href="javascript:void(0);"  name="<?php  echo $new_ev_data['event_id']; ?>" id="ln_<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="details_list(this.name,'<?php echo $web_url= $new_ev_data["web_url"]; ?>');"><div id="ln_<?php  echo $new_ev_data['event_id']; ?>">View</div></a>                <a href="adm_event_edit.php?ev_id=<?php  echo $new_ev_data['event_id']; ?>" target="_blank"></a></td>
                </tr>
			  
			    <tr>
                <td colspan="7"> <div id="det_<?php  echo $new_ev_data['event_id']; ?>"></div>   
                
                
            
                
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="3%" align="center" class="tab_header1">
				
				<a href="javascript:void();" onclick="javascript:checkAll('event_table', true);"><img src="images/checked.png" /></a><a href="javascript:void();" onclick="javascript:checkAll('event_table', false);"></a>				</td>
                <td width="3%" align="center" class="tab_header1"><a href="javascript:void();" onclick="javascript:checkAll('event_table', false);"><img src="images/uncheck.png" /></a></td>
                <td width="8%" align="center" class="tab_header1">Event Id</td>
                <!--<td width="6%" align="center" class="tab_header1">Event Type </td>-->
                <td width="19%" align="center" class="tab_header1">Event Name </td>
                <td width="8%" align="center" class="tab_header1">Country</td>
                <td width="33%" align="center" class="tab_header1">Website</td>
                <td width="7%" align="center" class="tab_header1">Status</td>
                <td width="10%" align="center" class="tab_header1">Event Dates</td>
              </tr>
              
			  <?php
			 $sql_new_ev_inv="SELECT * FROM `event` WHERE `web_url`='$web_url' order by `event_id` DESC";
			 $link_new_ev_inv=mysqli_query($link,$sql_new_ev_inv);
			 $kd=0;
			 while($new_ev_data_inv=mysqli_fetch_array($link_new_ev_inv))
			  	{
								
			echo	$kd=$kd+1;	
								
			  ?>
			              

              <tr >
                <td colspan="2" align="center">
                  
                  <input type="checkbox" name="content1[]" class="ads_Checkbox" value="<?php echo  $new_ev_data_inv['event_id']; ?>" <?php if( $kd > 1 ) {  echo "checked='checked'"; } ?>>                </td>
                <td align="center"><?php echo $new_ev_data_inv['event_id']; ?><br>
<a href="javascript:void(0);" id="<?php  echo $new_ev_data_inv['event_id']; ?>" class="link" onclick="manage(this.id)">Manage</a>

</td>
                <!--  <td align="center"><?php  //echo event_type($new_ev_data_inv['event_type']); ?></td>-->
                <td align="center" style="font-size:11px;"><?php echo $new_ev_data_inv['event_name']; ?></td>
                <td align="center" ><?php echo event_country($new_ev_data_inv['country']); ?></td>
                <td align="center" style="font-size:12px"><?php echo $new_ev_data_inv['web_url']; ?></td>
                <td align="center" style="font-size:12px"><?php echo $new_ev_data_inv['status']; ?></td>
                <td align="center" class="dt"><?php 
				
				echo date('d.M.Y', strtotime($new_ev_data_inv['event_stat']))."<br>To<br>".date('d.M.Y', strtotime($new_ev_data_inv['event_end']));
				
				
				 ?>
                <br>
                <span style="color:#000000">PO-<?php 	echo date('d.M.Y', strtotime($new_ev_data_inv['date_post'])); ?></span></td>
              </tr>
			  
			    <tr>
                <td colspan="9"> <div id="det_<?php  echo $new_ev_data_inv['event_id']; ?>"></div>                </td>
                </tr>
			 <?php
			
			 }
			 ?> 
              <tr>
                <td colspan="3"></td>

                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
                <td colspan="2">&nbsp;</td>
              </tr>
            </table>
                
                
                
                
                
                
                
                
                             </td>
                </tr>
			 <?php
			 
			 }
			 ?> 
              <tr>
                <td>
                
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
                <td width="3%">&nbsp;</td>
                <td width="15%" colspan="2">&nbsp;</td>
              </tr>
            </table>
            
            
            <a href="javascript:void(0);"  class="link" onclick="save_value()">          
            
    <input type="button" id="save_value" name="save_value" value="Manage Events"  />
    
    </a>
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
