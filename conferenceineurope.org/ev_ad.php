<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("mysqli_dbconn.php");
include("fun.php");
$mail_header=file_get_contents("mail_header.php");
$mail_footer=file_get_contents("mail_footer.php");

$date=date("Y-m-d");
$contact_name=str_xss($_POST['contact_name']);
$orgn_name=str_xss($_POST['orgn_name']);
$org_mail=str_xss($_POST['org_mail']);
$pass=str_xss($_POST['pass']);
$con_pass=str_xss($_POST['con_pass']);
$event_name=str_xss($_POST['event_name']);
$evt_topic=$_POST['evt_topic'];
$event_type=str_xss($_POST['event_type']);
$country=str_xss($_POST['country']);
$state=str_xss($_POST['state']);
$city=str_xss($_POST['city']);

$org_society=str_xss($_POST['org_society']);
$ev_contact_p=str_xss($_POST['ev_contact_p']);
$ev_enq_email=str_xss($_POST['ev_enq_email']);
$ev_url=str_xss($_POST['ev_url']);
$ev_start_date_f=date('Y-m-d', strtotime($_POST['ev_start_date_f']));
$ev_end_date_f=date('Y-m-d', strtotime($_POST['ev_end_date_f']));
$dead_abst=date('Y-m-d', strtotime($_POST['dead_abst']));
$ev_desc=str_xss($_POST['ev_desc']);
$status="New";
$chk_topic=$_REQUEST['chk_topic'];
$keyword=implode("#",$chk_topic);
$keyword = addslashes($keyword );
$logo='';
$captcha=$_POST['captcha'];



if ($captcha!=$_SESSION['key'])

	{

	echo "<script>alert('Security code doesnot matched');</script>";

	return false;

	}



$v1= user_val($org_mail);


			if($v1==0)

			{

			echo "<script>alert('This Mail Id Already Registered Please Enter Newone');</script>";

			echo "<script>$('#org_em_er').html('This Mail Id Already Registered Please Enter Newone');</script>";

			echo "<script>document.add_event.org_mail.focus();</script>";

			}



   













if($v1!=0)

{

$val_code=md5(time());

 $sql_add_org ="INSERT INTO `org_detail` ( `contact_person_name`, `orginisation_name`,`logo`, `org_mail`, `org_pass`, `reg_date`,`status`,`val_code`)

								 VALUES ( '$contact_name', '$orgn_name','$logo', '$org_mail', '$pass', '$date','New','$val_code');"; 

								 



								 

								 

mysqli_query($link,$sql_add_org);

$org_id=mysqli_insert_id($link);


 $org_sqll="INSERT INTO `user_login` (`list_id`,`user_id`, `password`, `user_type`,`status`) VALUES ('$org_id','$org_mail', '$pass', 'ORGANIZER','$status');";
mysqli_query($link,$org_sqll);











  $sql_add_ev="INSERT INTO `event` ( `org_id`,`event_topic`, `event_type`, `event_name`, `country`, `state`, `city`, `org_society`, `contact_person_event`, `event_enq_email`, `web_url`, `event_stat`, `event_end`, `abstract_deadline`, `short_desc`,`keywords`, `date_post`, `status` )

 VALUES ( '$org_id','$evt_topic', '$event_type', '$event_name', '$country', '$state', '$city', '$org_society', '$ev_contact_p', '$ev_enq_email', '$ev_url', '$ev_start_date_f', '$ev_end_date_f', '$dead_abst', '$ev_desc','$keyword','$date', '$status');";
	

 

 mysqli_query($link,$sql_add_ev);

 

$cur_ev_id = mysqli_insert_id($link);

 

$_SESSION['cart']=array();





$sql_mail=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `mail` WHERE `id`='1'"));

		 	$mail_to=$org_mail;

			$mail_from=$sql_mail['mail_from'];

			$mail_sub=$sql_mail['subject'];	

			$msg_m=$sql_mail['msg'];

			







$message = <<<EOF

$mail_header

<strong>Contact Name</strong> : $contact_name <br>

<strong>Organization Name</strong> : $orgn_name<br>

<strong>Account Id</strong> : $org_mail<br>

<strong>Account Password</strong> : $pass <br>

<hr>

<strong>Event Id</strong> : $cur_ev_id<br>

<strong>Event Name</strong> : $event_name<br>

<strong>Enquiry Mail Id</strong> : $ev_enq_email<br>

<hr>



<div align="center" style="">Please Click  validate your Organizer Account, <br />

        <br>

        <br>

        <a href="https://freeconferencealerts.com/org_validate.php?code=$val_code" style="text-decoration:none;  font-size:20px;  padding:5px;  background:#07bf51; color:#FFFFFF; border-radius:10px; border-radius:10px;">Click Here</a> <br />

        <br />

</div>

 <hr>

$mail_footer

EOF;





   //end of message 		

			

				

		   

		  	$headers = "From: " . strip_tags($mail_from) . "\r\n";

			$headers .= "Reply-To: ". strip_tags($mail_from) . "\r\n";

			$headers .= "MIME-Version: 1.0\r\n";

			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



		//    $ok = mail($mail_to,$mail_sub, $message, $headers);

 
  echo "<script>alert('Event Added Successfully');</script>";
  
  echo "<script>document.getElementById('add_event').reset(); </script>";





}

?>

<script>
  <?php
	$mail_to = base64_encode($mail_to);
	$mail_sub = base64_encode($mail_sub);
	$message = base64_encode($message);
	$headers = base64_encode($headers);
  ?>
function sendEmailOnLoad() {
   var email = '<?php echo $mail_to; ?>';
   var mail_sub = '<?php echo $mail_sub; ?>';
   var message = '<?php echo $message; ?>';
   var headers = '<?php echo $headers; ?>';

   console.log('check');
	var postInfo = btoa(JSON.stringify({"email" : email , "mail_sub" : mail_sub, "message" : message,"headers" :headers  }));
	var dataArr = {"type": 'single', "data": postInfo};
	
   jQuery.ajax({
	   url :  "//allmail.conferencecart.com/authverify.php",
	   type : 'POST',
	   data : dataArr,
	   success: function(response){
		  //  $('#result').html(response);
	   },
	   error: function(xhr, status, error){
		   console.error(xhr.responseText);
	   }
   });
}

// Call the function when the document is ready
$(document).ready(function() {
   sendEmailOnLoad();
});
</script>
