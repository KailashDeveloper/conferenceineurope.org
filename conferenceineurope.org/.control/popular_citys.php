<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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

<script language="javascript" src="../js/jquery.min.js"></script>



<link rel="stylesheet" type="text/css" href="css/admin.css" />

<link rel="stylesheet" type="text/css" href="css/vmenu.css" />

<script type="text/javascript" src="js/menu.js"></script>

<link rel="stylesheet" type="text/css" href="css/sddm.css" >

<link rel="stylesheet" type="text/css" href="css/form.css" >




<script language="javascript">

$(function(){		   
$('#popular_citys_form').submit(function(e){		
e.preventDefault();
var form=$(this);
var post_data=form.serialize();
var post_url=form.attr('action');
$('#log_err').html("<img src='images/loading.gif' />");
  $.ajax({
  type:"POST",
  url:post_url,
  data:post_data,
  success:function(msg){$('#log_err').html(msg);}
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

            <td height="37" align="center" class="inner_welcome">Popular Cities</td>

          </tr>

          

          <tr>

            <td>
     
     <form name="popular_citys_form" id="popular_citys_form" action="popular_citys_process.php" >

<?php
$sql_dist_country= mysqli_query($link,"SELECT DISTINCT `country` FROM `place`");
	
	while($dist_country=mysqli_fetch_array($sql_dist_country))
		{
			extract($dist_country);
		
			$dd=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `country` WHERE `id` like '$country'"));
?>

<h3 style="width:100%; float:left"> <?php echo $dd['country']; ?> </h3>

<?php
$sql_city=mysqli_query($link,"SELECT * FROM `place` WHERE `country` ='$country'");

while($city_data=mysqli_fetch_array($sql_city))
	{
?>
<div  style="width:300px; float:left">
<input type="checkbox" name="chk_place[]" id="chk_place[]" value="<?php echo $city_data['place_id'] ;?>"  /> 
<span ><?php echo $city_data['pleace_name'] ;?> </span>



<script language="javascript">   
<?php
if($city_data['popular']==1)
{
?> 
 $(":checkbox[value='<?php echo $city_data['place_id'] ;?>']").attr("checked","true");                    
  
<?php
}
?>
</script>  
</div>


<?php
	}
?>

<?php
		}
?>
<input type="submit" name="Submit" value="Submit"  />
</form>


<div id="log_err" ></div>














<br /></td>

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

