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
$('#add_ad_group').submit(function(e){									
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
            <td height="37" align="center" class="inner_welcome">Create Group Promote</td>
          </tr>
          
          <tr>
            <td>
<?php
if(isset($_REQUEST['edit_id']))
	{
	$edit_id=$_REQUEST['edit_id'];
	$sql_details=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `group_promote` WHERE `group_id` ='$edit_id'"));		
	extract($sql_details);
	}
	

?>			
			
			<form action="ad_group.php" method="post" name="add_ad_group" id="add_ad_group" enctype="multipart/form-data">
            
            
            <?php
			if(isset($edit_id))
			{
			?>
            
            <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_id; ?>"  />
            <?php
			}
			?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td colspan="5"></td>
  </tr>
  <tr>
    <td class="form_menu">Heading </td>
    <td>&nbsp;</td>
    <td colspan="2"><label>
      <input name="heading" type="text" id="heading" class="form_text" required="required" value="<?php if(isset($heading)) echo $heading; ?>" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Select Listing Doman</td>
    <td>&nbsp;</td>
    <td colspan="2">
    <select name="listing_domain" class="form_list" id="listing_domain">
    <option value="CONFERENCEALERTS.IN"
 <?php if(isset($listing_domain) and $listing_domain == 'CONFERENCEALERTS.IN') echo "selected='selected'"; ?>>CONFERENCEALERTS.IN</option>
 
 
<option value="ALLCONFERENCEALERT.COM"
 <?php if(isset($listing_domain) and $listing_domain == 'ALLCONFERENCEALERT.COM') echo "selected='selected'"; ?>>ALLCONFERENCEALERT.COM</option>



<option value="CONFERENCEALERT.CO" 
<?php if(isset($listing_domain) and $listing_domain == 'CONFERENCEALERT.CO') echo "selected='selected'"; ?> >CONFERENCEALERT.CO</option>

<option value="CONFERENCEALERT.CO.IN"
 <?php if(isset($listing_domain) and $listing_domain == 'CONFERENCEALERT.CO.IN') echo "selected='selected'"; ?>>CONFERENCEALERT.CO.IN</option>

<option value="CONFERENCEALERT.COM" 
<?php if(isset($listing_domain) and $listing_domain == 'CONFERENCEALERT.COM') echo "selected='selected'"; ?>>CONFERENCEALERT.COM</option>

<option value="CONFERENCEALERT.IN" 
<?php if(isset($listing_domain) and $listing_domain == 'CONFERENCEALERT.IN') echo "selected='selected'"; ?>>CONFERENCEALERT.IN</option>

<option value="CONFERENCEALERT.INFO"
 <?php if(isset($listing_domain) and $listing_domain == 'CONFERENCEALERT.INFO') echo "selected='selected'"; ?>>CONFERENCEALERT.INFO</option>

<option value="CONFERENCEALERTS.INFO" 
<?php if(isset($listing_domain) and $listing_domain == 'CONFERENCEALERTS.INFO') echo "selected='selected'"; ?>>CONFERENCEALERTS.INFO</option>

<option value="CONFERENCEALERTS.NET"
 <?php if(isset($listing_domain) and $listing_domain == 'CONFERENCEALERTS.NET') echo "selected='selected'"; ?>>CONFERENCEALERTS.NET</option>

<option value="CONFERENCEALERTS.ORG" 
<?php if(isset($listing_domain) and $listing_domain == 'CONFERENCEALERTS.ORG') echo "selected='selected'"; ?>>CONFERENCEALERTS.ORG</option>

<option value="CONFERENCEINEUROPE.ORG"
 <?php if(isset($listing_domain) and $listing_domain == 'CONFERENCEINEUROPE.ORG') echo "selected='selected'"; ?>>CONFERENCEINEUROPE.ORG</option>

<option value="FREECONFERENCEALERTS.COM"
 <?php if(isset($listing_domain) and $listing_domain == 'FREECONFERENCEALERTS.COM') echo "selected='selected'"; ?>>FREECONFERENCEALERTS.COM</option>

<option value="NEWCONFERENCEALERTS.COM" 
<?php if(isset($listing_domain) and $listing_domain == 'NEWCONFERENCEALERTS.COM') echo "selected='selected'"; ?>>NEWCONFERENCEALERTS.COM</option>
 </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="21%" class="form_menu">Country</td>
    <td width="3%">&nbsp;</td>
    <td colspan="2"><select name="country" class="form_text" id="country" >
      <option  value="">Choose Country</option>
      <?php

                                $sql_con=mysqli_query($link,"SELECT * FROM `country` ORDER BY `country` ASC");

                                while($con_data=mysqli_fetch_array($sql_con))

                                {

                                ?>
      <option  value="<?php echo $con_data['country']; ?>" <?php if( isset($country) and $country == $con_data['country']) echo "selected='selected'"; ?>><?php echo $con_data['country']; ?></option>
      <?php

                                }

                                ?>
      </select></td>
    <td width="35%">&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Domain Name</td>
    <td>&nbsp;</td>
    <td colspan="2"><label>
      <input name="domain" type="text"  class="form_text" id="domain" value="<?php if(isset($domain)) echo $domain; ?>">
      </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="form_menu">Event Id Lists</td>
    <td>&nbsp;</td>
    <td colspan="3">
    
    <textarea id="event_id_list" name="event_id_list"   class="form_text"><?php if(isset($event_id_list)) echo $event_id_list; ?></textarea>
    
    
    </td>
    </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="13%"><label>
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
