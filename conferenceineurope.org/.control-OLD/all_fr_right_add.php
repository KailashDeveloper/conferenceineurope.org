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

	 $sql_delete="DELETE FROM `ad_image` WHERE `id` ='$delete_id' ";

	 mysqli_query($link,$sql_delete);

	}

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

            <td width="97%" height="37" align="center" class="inner_welcome">All Left Add Image </td>

            <td width="3%" align="center" class="inner_welcome"><a href="all_subsc_excel.php"></a></td>

          </tr>

          

          <tr>

            <td colspan="2">

            

			

			

			<table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="6%" align="center" class="tab_header1"> Id</td>

                <td width="13%" align="center" class="tab_header1">Image</td>

                <td width="12%" align="center" class="tab_header1">Heading</td>

                <td width="16%" align="center" class="tab_header1">Url </td>

                <td align="center" class="tab_header1">Action</td>

              </tr>

              

			  <?php

			 $sql_new_ev="SELECT * FROM `ad_image` WHERE `ad_type`='FR_RIGHT' ORDER BY `id`  DESC";

			  $link_new_ev=mysqli_query($link,$sql_new_ev);

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

			              



              <tr class="<?php echo $class;  ?>" style="padding:5px;">

                <td height="29" align="center"><?php echo $new_ev_data['id']; ?></td>

                <td align="center"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/ad/<?php echo  $new_ev_data['image']; ?>" /></td>

                <td align="center"><?php echo  $new_ev_data['hed']; ?></td>

                <td align="center"><?php echo $new_ev_data['url']; ?></td>

                <td width="6%" align="center"><a href="all_left_add.php?delete_id=<?php echo $new_ev_data['id']; ?>" class="link" >Delete</a></td>

              </tr>

			  

			    <tr>

                <td colspan="5"> <div id="det_<?php  echo $new_ev_data['event_id']; ?>"></div>                </td>

                </tr>

			 <?php

			 }

			 ?> 

              <tr>

                <td>&nbsp;</td>

                <td></td>

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

