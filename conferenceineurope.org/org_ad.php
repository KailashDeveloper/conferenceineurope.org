<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

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



$status="New";
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
			echo "<script>document.create_org.org_mail.focus();</script>";
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



		   $ok = mail($mail_to,$mail_sub, $message, $headers);

			

			

			if ($ok)

			 { 

			 //echo "<p>mail sent to $mail_to!</p>"; 

			 }

			  else

			  { 

			 // echo "<p>mail could not be sent!</p>"; 

			  }


 
  echo "<script>alert('Event Added Successfully');</script>";
  
  echo "<script>document.getElementById('create_org').reset(); </script>";





}

?>