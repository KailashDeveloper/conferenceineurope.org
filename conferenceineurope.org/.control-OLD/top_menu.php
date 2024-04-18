<style type="text/css">
#chatbox_show{
	position:fixed;
	float:right;
	left:0px;
	bottom:0px;
	width:243px;
	
	background:#FFFFFF;
	border:4px solid #FF0000;
	border-radius:10px;
	-moz-box-shadow: 0 0 10px #000000;
	-webkit-box-shadow: 0 0 10px #000000;
	box-shadow: 0 0 10px #000000;
	z-index:1;
}
#new_chat_user_content{
height:360px;
border:1px solid #999999;
overflow:scroll;
}

.showemailidchat{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#000000;
}

a.acceptbutton{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	font-weight:bold;
	color:#FFFFFF;
	text-align:center;
	border-radius:3px;
	background:#009900;
	height:20px;
	padding:3px 10px 3px 10px;
	border:1px solid #009933;
	text-decoration:none;
}

a:hover.acceptbutton{
	background:#00CC33;
}

a.rejectbutton{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	font-weight:bold;
	color:#FFFFFF;
	text-align:center;
	border-radius:3px;
	background:#FF0000;
	height:20px;
	padding:3px 10px 3px 10px;
	border:1px solid #D20226;
	text-decoration:none;
}

a:hover.rejectbutton{
	background:#990000;
}

.chat_boxs_alert_how{
	border:1px solid #666666;
	border-radius:3px;
	width:190px;
	overflow:hidden;
	margin:3px;
}

</style>
<script language="javascript" src="js/jquery.min.js"></script>


<script>

//setInterval(function(){$.get('new_chat_user_time.php',{},function(d){$('#chatbox_show').prepend(d);});},1000);
var x=0;
function call_new_chat()
{
    // $.get('new_chat_user_time.php',{},function(d){$('#new_chat_user_content').prepend(d);});
	 
	 
	 	var d = new Date();
	    var n = d.getTime();
	  
		$.ajax({
		type:"POST",
		url:'new_chat_user_time.php',
		data:'',
		cache: false,
		success:function(msg){$('#new_chat_user_content').prepend(d);}
		});
	 
	 
	 
	 
	 
	 
	 
	setTimeout(call_new_chat, 1000);
	
 }

	call_new_chat ();



</script>



<script language="javascript">
function chat_acceept(chat_id)
	{
	//$.post('set_chat_status.php',{chat_id:chat_id,status:'ACCEPT'},function(d){$('#kd').html(d);});	
	
		var d = new Date();
	    var n = d.getTime();
	  
		$.ajax({
		type:"POST",
		url:'set_chat_status.php',
		data:'chat_id='+chat_id+'&status=ACCEPT',
		cache: false,
		success:function(msg){$('#kd').prepend(d);}
		});
	
	
	//alert(chat_id);	
    $('#cht_tb'+chat_id).css('display','none');
	x=x-1;
	call_new_chat ();
	}
	
function chat_reject(chat_id)
	{
	//$.post('set_chat_status.php',{chat_id:chat_id,status:'REJECT'},function(d){$('#kd').html(d);});	
	
	
		var d = new Date();
	    var n = d.getTime();
	  
		$.ajax({
		type:"POST",
		url:'set_chat_status.php',
		data:'chat_id='+chat_id+'&status=REJECT',
		cache: false,
		success:function(msg){$('#kd').prepend(d);}
		});
	
	
	
	
	
	//alert(chat_id);	
    $('#cht_tb'+chat_id).css('display','none');
	x=x-1;
	call_new_chat ();
	}	
function hide_new_chat_box()
	{
	 if($('#new_chat_user_content').css('display')=='none')
	 	{
			$('#new_chat_user_content').css('display','block') ;	
		}
		else {
        $('#new_chat_user_content').css('display','none') ;	
		
		}
	}
</script>

<div id="kd"></div>
<table width="110" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="bottom"><img src="images/url.png" alt="home" width="46" height="46"/></td>
    <td align="center" valign="bottom"><a href="logout.php"><img src="images/logout.png" alt="logout" width="50" height="45" border="0" /></a></td>
  </tr>
</table>


<!--<div id="chatbox_show">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr class="chatboxhead">
        <td width="14" height="31">&nbsp;</td>
        <td width="199">Chat Box </td>
        <td width="23" valign="top"><a href="javascript:void(0)" onclick="javascript:hide_new_chat_box()"> <img src="cht_img/minus_button.png" width="16" height="16" /></a> </td>
        <td width="24" valign="top"><a href="javascript:void(0)" onclick="javascript:closeChatBox(chatboxtitle+)"> <img src="cht_img/cross_button.png" width="16" height="16" /> </a> </td>
      </tr>
    </table>

<div id="chat_top_menus"></div>
	<div id="new_chat_user_content"></div>
</div>-->



