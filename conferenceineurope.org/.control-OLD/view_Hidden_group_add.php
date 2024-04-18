<?php
ob_start();
session_start();

if(!isset($_SESSION['ALERT_ADMIN']))
header("location:index.php");
include("mysqli_dbconn.php");
include("fun.php");
if(isset($_REQUEST['delete_id']))
	{
	 $delete_id=$_REQUEST['delete_id'];
	 $sql_delete="Update `group_promote` set `status` ='' WHERE `group_id` ='$delete_id' ";
	 mysqli_query($link,$sql_delete);
	}
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
<script language="javascript" src="js/sub_pagi.js"></script>


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

            <td width="97%" height="37" align="center" class="inner_welcome">All Top Add Image </td>

            <td width="3%" align="center" class="inner_welcome"><a href="all_subsc_excel.php"></a></td>

          </tr>

          

          <tr>

            <td colspan="2">

            

			

			

			<table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="7%" align="center" class="tab_header1"> Id</td>
                <td width="28%" align="center" class="tab_header1">Heading/Organizer/Listing Domain</td>

                <td width="26%" align="center" class="tab_header1">Promote Url</td>

                <td width="22%" align="center" class="tab_header1">Country </td>
                <td colspan="2" align="center" class="tab_header1">Action</td>

                </tr>

              

			  <?php

			 $sql_new_ev="SELECT * FROM `group_promote` where `status`!='Hide' ORDER BY `group_id` DESC";

			  $link_new_ev=mysqli_query($link,$sql_new_ev);

$j=0;
			  while($new_ev_data=mysqli_fetch_array($link_new_ev))

			  	{

								if($j%2==0)

								{

								$class="tab_bg1";

								}

								else

								{

								$class="tab_bg2";

								}

								$j++;

			  ?>

			              



              <tr class="<?php echo $class; ?>" style="padding:5px;">

                <td height="29" align="center"><?php echo $new_ev_data['group_id']; ?></td>
                <td align="center"><?php echo $new_ev_data['heading']; ?>
                <hr>
				<?php echo $new_ev_data['domain']; ?>
                <hr />
                <?php echo $new_ev_data['listing_domain']; ?>
                
                
                </td>

                <td align="center">https://www.<?php echo $new_ev_data['listing_domain']; ?>/groupromote.php?group=<?php echo $new_ev_data['group_id'];  ?></td>

                <td align="center"><?php echo $new_ev_data['country']; ?></td>
                <td width="9%" align="center"><a href="create_group_add.php?edit_id=<?php echo $new_ev_data['group_id']; ?>" class="link" >Edit</a>&nbsp;</td>

                <td width="8%" align="center"><a href="view_group_add.php?delete_id=<?php echo $new_ev_data['group_id']; ?>" class="link" >Show</a>&nbsp;</td>

              </tr>

			  

			    <tr>

                <td colspan="6"> <div id="det_<?php  echo $new_ev_data['event_id']; ?>"></div>                </td>

                </tr>

			 <?php

			 }

			 ?> 

              <tr>

                <td>&nbsp;</td>
                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>
                <td>&nbsp;</td>

                <td>&nbsp;</td>

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

    <td height="100" colspan="3"  background="images/header-bg.jpg"><div class="copyright">Copyright &copy; 2013, All Rights Reserved, Powered By &nbsp; Conferencealerts</div></td>

  </tr>

</table>



</body>

</html>

