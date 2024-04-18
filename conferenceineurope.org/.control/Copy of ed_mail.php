<?php

ob_start();

session_start();

if(!isset($_SESSION['ALERT_ADMIN']))

header("location:index.php");



include("mysqli_dbconn.php");

include("fun.php");

if(isset($_REQUEST['Submit']))

	{	

	$m_from1=$_REQUEST['m_from1'];

	$subb1=$_REQUEST['subb1'];

	$msg1=$_REQUEST['msg1'];

	$admin_mail1=$_REQUEST['admin_mail1'];

	mysqli_query($link,"UPDATE `mail` SET `mail_from` = '$m_from1',`subject` = '$subb1',`msg` = '$msg1',`admin_mail`='$admin_mail1' WHERE `id` =1;");

	

	$m_from2=$_REQUEST['m_from2'];

	$subb2=$_REQUEST['subb2'];

	$msg2=$_REQUEST['msg2'];

	$admin_mail2=$_REQUEST['admin_mail2'];

	mysqli_query($link,"UPDATE `mail` SET `mail_from` = '$m_from2',`subject` = '$subb2',`msg` = '$msg2' ,`admin_mail`='$admin_mail2' WHERE `id` =2;");

	

	$m_from3=$_REQUEST['m_from3'];

	$subb3=$_REQUEST['subb3'];

	$msg3=$_REQUEST['msg3'];

	$admin_mail3=$_REQUEST['admin_mail3'];

	mysqli_query($link,"UPDATE `mail` SET `mail_from` = '$m_from3',`subject` = '$subb3',`msg` = '$msg3' ,`admin_mail`='$admin_mail3' WHERE `id` =3;");

	

	$m_from4=$_REQUEST['m_from4'];

	$subb4=$_REQUEST['subb4'];

	$msg4=$_REQUEST['msg4'];

	$admin_mail4=$_REQUEST['admin_mail4'];

	mysqli_query($link,"UPDATE `mail` SET `mail_from` = '$m_from4',`subject` = '$subb4',`msg` = '$msg4' ,`admin_mail`='$admin_mail4' WHERE `id` =4;");

	

	$m_from5=$_REQUEST['m_from5'];

	$subb5=$_REQUEST['subb5'];

	$msg5=$_REQUEST['msg5'];

	$admin_mail5=$_REQUEST['admin_mail5'];

	mysqli_query($link,"UPDATE `mail` SET `mail_from` = '$m_from5',`subject` = '$subb5',`msg` = '$msg5' ,`admin_mail`='$admin_mail5' WHERE `id` =5;");

	

	$m_from6=$_REQUEST['m_from6'];

	$subb6=$_REQUEST['subb6'];

	$msg6=$_REQUEST['msg6'];

	$admin_mail6=$_REQUEST['admin_mail6'];	

	mysqli_query($link,"UPDATE `mail` SET `mail_from` = '$m_from6',`subject` = '$subb6',`msg` = '$msg6' ,`admin_mail`='$admin_mail6' WHERE `id` =6;");

	

	/// forgot password

	$m_from7=$_REQUEST['m_from7'];

	$subb7=$_REQUEST['subb7'];

	$msg7=$_REQUEST['msg7'];

	$admin_mail7=$_REQUEST['admin_mail7'];	

	mysqli_query($link,"UPDATE `mail` SET `mail_from` = '$m_from7',`subject` = '$subb7',`msg` = '$msg7' ,`admin_mail`='$admin_mail7' WHERE `id` =7;");



	

	

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Admin Pannel</title>





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



<script language="javascript" type="text/javascript">

function validate()

	{

	    var m_from1=document.form1.m_from1.value;  			

		var subb1 =document.form1.subb1.value;  

		var msg1=document.form1.msg1.value;

		var admin_mail1=document.form1.admin_mail1.value;

		

		alert(m_from1);

		/* Val 1*/

		if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(m_from1))  // validation for email

   {

         alert("Invalid E-mail Address! Please re-enter");

		document.form1.m_from1.focus();

		error=1;

		return false;	

   }

   if(subb1=="") // depature  date blank validation

  			 {

	    alert("Please Enter Subject");

		document.form1.subb1.focus();

		error=1;

		return false;	

  			 }

			 

  	if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(admin_mail1))  // validation for email

   {

         alert("Invalid E-mail Address! Please re-enter");

		document.form1.admin_mail1.focus();

		error=1;

		return false;	

   }			 

			 

			 

  if(msg1=="") // depature  date blank validation

  			 {

	    alert("Please Enter Messeage");

		document.form1.msg1.focus();

		error=1;

		return false;	

  			 }

		/* End */

		

		

	    var m_from2=document.form1.m_from2.value;  			

		var subb2 =document.form1.subb2.value;  

		var msg2=document.form1.msg2.value;

		var admin_mail2=document.form1.admin_mail2.value; 

		

		var m_from3=document.form1.m_from3.value;  			

		var subb3 =document.form1.subb3.value;  

		var msg3=document.form1.msg3.value; 

		var admin_mail3=document.form1.admin_mail3.value;

		

		var m_from4=document.form1.m_from4.value;  			

		var subb4 =document.form1.subb4.value;  

		var msg4=document.form1.msg4.value; 

		var admin_mail4=document.form1.admin_mail4.value;

	

		var m_from5=document.form1.m_from5.value;  			

		var subb5 =document.form1.subb5.value;  

		var msg5=document.form1.msg5.value; 

		var admin_mail5=document.form1.admin_mail5.value;

		

		

		var m_from6=document.form1.m_from6.value;  			

		var subb6 =document.form1.subb6.value;  

		var msg6=document.form1.msg6.value; 

		var admin_mail6=document.form1.admin_mail6.value;

	  

	  	var m_from7=document.form1.m_from7.value;  			

		var subb7 =document.form1.subb7.value;  

		var msg7=document.form1.msg7.value; 

		var admin_mail7=document.form1.admin_mail7.value;

		

		

	

			 

	///

		if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(m_from2))  // validation for email

   {

	    alert("Invalid E-mail Address! Please re-enter.");

		document.form1.m_from2.focus();

		error=1;

		return false;	

   }

 

   

   if(subb2=="") // depature  date blank validation

  			 {

	    alert("Please Enter Subject");

		document.form1.subb2.focus();

		error=1;

		return false;	

  			 }

			 

			 

    	if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(admin_mail2))  // validation for email

   {

         alert("Invalid E-mail Address! Please re-enter");

		document.form1.admin_mail2.focus();

		error=1;

		return false;	

   }

   			 

			 

  if(msg2=="") // depature  date blank validation

  			 {

	    alert("Please Enter Messeage");

		document.form1.msg2.focus();

		error=1;

		return false;	

  			 }

	///

	

	if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(m_from3))  // validation for email

   {

         alert("Invalid E-mail Address! Please re-enter");

		document.form1.m_from3.focus();

		error=1;

		return false;	

   }

   if(subb3=="") // depature  date blank validation

  			 {

	    alert("Please Enter Subject");

		document.form1.subb3.focus();

		error=1;

		return false;	

  			 }

			 

    	if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(admin_mail3))  // validation for email

   {

         alert("Invalid E-mail Address! Please re-enter");

		document.form1.admin_mail3.focus();

		error=1;

		return false;	

   }

   			 

			 

  if(msg3=="") // depature  date blank validation

  			 {

	    alert("Please Enter Messeage");

		document.form1.msg3.focus();

		error=1;

		return false;	

  			 }

			 

	///

	

		if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(m_from4))  // validation for email

   {

         alert("Invalid E-mail Address! Please re-enter");

		document.form1.m_from4.focus();

		error=1;

		return false;	

   }

   if(subb4=="") // depature  date blank validation

  			 {

	    alert("Please Enter Subject");

		document.form1.subb4.focus();

		error=1;

		return false;	

  			 }

			 

    	if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(admin_mail4))  // validation for email

   {

         alert("Invalid E-mail Address! Please re-enter");

		document.form1.admin_mail4.focus();

		error=1;

		return false;	

   }

   			 

			 

  if(msg4=="") // depature  date blank validation

  			 {

	    alert("Please Enter Messeage");

		document.form1.msg4.focus();

		error=1;

		return false;	

  			 }

	

	

			 



/////

	

		if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(m_from5))  // validation for email

   {

         alert("Invalid E-mail Address! Please re-enter");

		document.form1.m_from5.focus();

		error=1;

		return false;	

   }

   if(subb5=="") // depature  date blank validation

  			 {

	    alert("Please Enter Subject");

		document.form1.subb5.focus();

		error=1;

		return false;	

  			 }

			 

    	if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(admin_mail5))  // validation for email

   {

         alert("Invalid E-mail Address! Please re-enter");

		document.form1.admin_mail5.focus();

		error=1;

		return false;	

   }

   			 

			 

  if(msg5=="") // depature  date blank validation

  			 {

	    alert("Please Enter Messeage");

		document.form1.msg5.focus();

		error=1;

		return false;	

  			 }

/////

///

		if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(m_from6))  // validation for email

   {

	    alert("Invalid E-mail Address! Please re-enter.");

		document.form1.m_from6.focus();

		error=1;

		return false;	

   }

 

   

   if(subb6=="") // depature  date blank validation

  			 {

	    alert("Please Enter Subject");

		document.form1.subb6.focus();

		error=1;

		return false;	

  			 }

			 

			 

    	if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(admin_mail6))  // validation for email

   {

         alert("Invalid E-mail Address! Please re-enter");

		document.form1.admin_mail6.focus();

		error=1;

		return false;	

   }

   			 

			 

  if(msg6=="") // depature  date blank validation

  			 {

	    alert("Please Enter Messeage");

		document.form1.msg6.focus();

		error=1;

		return false;	

  			 }

	

	}	

	///////////

	

 if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(m_from7))  // validation for email

   {

	    alert("Invalid E-mail Address! Please re-enter.");

		document.form1.m_from7.focus();

		error=1;

		return false;	

   }

 

   

   if(subb7=="") // depature  date blank validation

  			 {

	    alert("Please Enter Subject");

		document.form1.subb7.focus();

		error=1;

		return false;	

  			 }

			 

			 

    	if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(admin_mail7))  // validation for email

   {

         alert("Invalid E-mail Address! Please re-enter");

		document.form1.admin_mail7.focus();

		error=1;

		return false;	

   }

   			 

			 

  if(msg7=="") // depature  date blank validation

  			 {

	    alert("Please Enter Messeage");

		document.form1.msg7.focus();

		error=1;

		return false;	

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

    <td width="31%"><img src="images/logo.png" alt="logo" width="340" height="103" /></td>

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

            <td height="37" align="center" class="inner_welcome">Edit Mail  Details </td>

          </tr>

          

          <tr>

            <td>

			

			<form id="form1" name="form1" method="post" action="" onsubmit="return validate(this.form);">

	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tab">

        

        <tr class="tab_header1">

          <td width="11%" height="38" align="center"><span class="table_sub_content">Mail For </span></td>

          <td width="26%" align="center"><span class="table_sub_content">Mail From </span></td>

          <td width="26%" align="center"><span class="table_sub_content">mail Subject </span></td>

          <td width="37%" align="center"><span class="table_sub_content">Send To Admin </span></td>

          <td width="37%" align="center"><span class="table_sub_content">Messeage</span></td>

        </tr>

        <?php

		$mail=mysqli_query($link,"SELECT * FROM `mail`");

		$s=0;

		$j=0;

		while ($sql_mail=mysqli_fetch_array($mail))

		{ 

		$s++;

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

        <tr class="<?php echo $class; ?>">

          <td align="center" valign="middle" class="table_content"><?php echo $sql_mail['mail_for']; ?></td>

          <td align="center" valign="middle"><input  name="m_from<?php echo $s;?>" type="text" class="form_text" id="m_from<?php echo $s;?>"  style="width:230px;"  value="<?php echo $sql_mail['mail_from']; ?>" /></td>

          <td align="center" valign="middle"><input  name="subb<?php echo $s;?>" type="text" class="form_text" id="subb<?php echo $s;?>" style="width:230px;" value="<?php echo $sql_mail['subject']; ?>"/></td>

          <td align="center" valign="middle"><input  name="admin_mail<?php echo $s;?>" type="text" class="form_text" id="admin_mail<?php echo $s;?>" style="width:230px;" value="<?php echo $sql_mail['admin_mail']; ?>"/></td>

          <td align="center" valign="middle"><textarea name="msg<?php echo $s;?>" id="msg<?php echo $s;?>" style="width:300px; height:110px;background:#D9E7FF;border:1px solid #06567E;"><?php echo $sql_mail['msg']; ?></textarea></td>

        </tr>

        <?php } ?>

        <tr>

          <td height="30">&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td><input name="Submit" type="submit" class="form_submit" value="Submit" /></td>

          <td>&nbsp;</td>

        </tr>

        <tr>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

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

