<?php
include('dbconn_new.php');
//echo $date = date('m/d/Y h:i:s a', time());
//echo $ch_date_time=date("Y-m-d H:i:s");
//$time = date('g:iA M dS', strtotime('2014-02-16 20:44:09'));
?>

<?php
$sql_new_chat_user="SELECT * FROM `chat_user` where `status`='' and `admin_view`='' ORDER BY `id` DESC limit 0,1";
$sql_new_chat_user_link=mysqli_query($link,$sql_new_chat_user);
//echo mysqli_num_rows($sql_new_chat_user_link);
while($chat_date=mysqli_fetch_array($sql_new_chat_user_link))
	{
?>


<table border="0" align="left" cellpadding="0" cellspacing="5" class="chat_boxs_alert_how" id="cht_tb<?php echo $chat_date['id']; ?>">

  <tr>
    <td colspan="2" align="center" valign="middle"><div class="showemailidchat"><?php echo $chat_date['userid']; ?></div></td>
    </tr>

  <tr>
    <td align="center" valign="middle"><a href="#" class="acceptbutton" onclick="chat_acceept(this.id);" id="<?php echo $chat_date['id']; ?>">Accept</a></td>
    <td align="center" valign="middle"><a href="#" class="rejectbutton" onclick="chat_reject(this.id);" id="<?php echo $chat_date['id']; ?>">Reject</a></td>
  </tr>
</table>

<?php
$viewed_id=$chat_date['id'];
mysqli_query($link,"UPDATE `chat_user` SET `admin_view` = 'YES'");
}
?>