<?php
$fun="load";
function  str_xss($string)
	{
			$x = strip_tags($string);
			$xx = htmlentities($x);
			$xxx=addslashes($xx);
			$xxxx=special_rp($xxx);
			return($xxxx);
	}


function  http_str_xss($string)
	{
			$x = strip_tags($string);
			$xx = htmlentities($x);
			$xxx=addslashes($xx);			
			return($xxx);
	}


function  str_add($string)
	{
			$x = strip_tags($string);
			$xx = htmlentities($x);
			return($xx);
	}
function  remove_sls($string)
	{
			$xxx=stripslashes($string);
			return($xxx);
	}
	

function  event_type($ev_id)
	{
	
			if($ev_id==1){		return("Conference"); }
			if($ev_id==2){		return("Seminar"); }
			if($ev_id==3){		return("Workshop"); }
			if($ev_id==5){		return("Webinar") ;}
			if($ev_id==9){		return("Continuing professional development event") ;}
			if($ev_id==10){		return("Online conference") ;}
	}
	
function  event_cat($cat)
	{
		global $link2;
	$r=explode("###",$cat);
		$id=$r[0];
		$sql_ev=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `event_cat` WHERE `id`='$id'"));
		return($sql_ev['category']);		
	}

function  event_cat_id($cat) /// Event Cat id
	{
	$r=explode("###",$cat);
		$id=$r[0];
		return($id);		
	}



	
function  event_topic($topic)
	{
	$r=explode("###",$topic);
	return($r[2]);
	}
	
function  event_country($country)
	{
	$r=explode("#",$country);
	return($r[1]);
	}
	
	function  event_country_id($country)
	{
	$r=explode("#",$country);
	return($r[0]);
	}
	
	
function  event_url($url)
	{
	
			if (filter_var($url, FILTER_VALIDATE_URL)) {
			return ("<a href='$url' target='_blank' class='valid'>View Site</a>");
			} else {
			$return ="<span class='inv'>Invalid Url</span>";
			}
	
				/*$r=explode("http://",$url);
				if($r[1]=="")
				{
				$return ="<span class='inv'>Invalid Url</span>";
				}
				else 
				{	  
				return ("<a href='http://$r[1]' target='_blank' class='valid'>View Site</a>");
				exit;		
				}
				
				$d=explode("https://",$url);
				if($d[1]=="")
				{
				$return="<span class='inv'>Invalid Url</span>";
				}
				else 
				{	  
				return ("<a href='http://$d[1]' target='_blank' class='valid'>View Site</a>");
				exit;		
				}*/
		
		
	return $return;	
	}
	
function rem_sl($val)
	{
	$val=stripslashes($val);
	return($val);
	}

function url_special_char($url)
	{
	$url = preg_replace("![^a-z0-9]+!i", " ", $url);
	$url=rtrim(ltrim($url," "));
	return($url);
	}	
	
function sql_inj($val)	
	{
		global $link2;
	if(get_magic_quotes_gpc()){
		$val=stripslashes($val);
	}
	$val=mysqli_real_escape_string($link2,$val);
	return($val);
	}
		
function  org_detail($id)
	{
		global $link2;
	$dd=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `org_detail` WHERE `org_id`='$id'"));
	 

		return($dd['orginisation_name']);
  }		

function check_row_prom($id)
	{
global $link2;
	$cc=mysqli_num_rows(mysqli_query($link2,"SELECT * FROM `promote` WHERE `event_id`='$id' and `promote_type`='MCLINEEVENT'"));
	return($cc);
	}

function validate_valid_org($org_id)			
	{
		global $link2;
	if($org_id<926)
		{
		return 1;
		}
		else{
		  $sql_v=mysqli_num_rows(mysqli_query($link2,"SELECT * FROM `org_detail` WHERE `org_id`='$org_id' and `status`='Accept'"));
	  	  return $sql_v;
		  	}
	}
	
function event_id_encrypt($ev_id)	
	{
$ency_id=base64_encode($ev_id);
return($ency_id);
	}
function event_id_dcrypt($ency_code)	
	{
$ev_id=base64_decode($ency_code);
return($ev_id);
	}	
	
	
function get_evid_trid($transaction_id)
	{
		global $link2;
	$cc=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `transaction` WHERE `transaction_id`='$transaction_id'"));
	return($cc['event_id']);
	}	
	
function  get_ev_cat($event_topic)
	{
		global $link2;
	$r=explode("###",$event_topic);
	$cat_id=$r[0];
	$cc=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `event_cat` WHERE `id`='$cat_id'"));
	return($cc['category']);
  }		
		
	
	
function sp_replace($str)	
	{
	$str=str_replace(" ","_",$str);
	return($str); 
	}


function sp_replace123($str)	
	{
	$str=str_replace(" ","-",$str);
	return($str); 
	}


function remove_space_RL($str)
	{
	$res=ltrim(rtrim($str," ")," ");
	
	$res=str_xss($res);
	return($res);
	}	
	

function state_sep($state)	
	{
	$state=explode("#",$state);
	
	$se=str_replace("_"," ",$state[1]);
	return($se);
	
	}
	
function  org_email($id)
	{
		global $link2;
	$dd=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `org_detail` WHERE `org_id`='$id'"));
	return($dd['org_mail']);
  }	
		
function check_prom($id,$type)
	{
		global $link2;
	$cc=mysqli_num_rows(mysqli_query($link2,"SELECT * FROM `promote` WHERE `event_id`='$id' and `promote_type`='$type' and `exp_date`>= curdate()"));
	
return($cc);
	}	




function country_title($country)
		{
			global $link2;
		
		$country=str_xss($country);
		
		
		if(isset($_REQUEST['Month']))
		{
		$Month=$_REQUEST['Month'];
		
			$date=url_special_char(str_xss($Month));
			$ev_start_date=date('F Y', strtotime($Month));
		$Month=$ev_start_date;
		}
		else $Month="";
		
		
			//$cc=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `country` WHERE `country` ='$country'"));
			//echo "2017 - 2017 Upcoming Conferences Worldwide ".$cc['title'] ." ".$country."Main Conference Alerts , conference alerts 2017,conferencealerts 2017, Conference alerts 2017";
			
			echo "MC - Main Conference Alerts : Conferencealerts $Month , Conferencealert $Month , Conference Alert $Month ,conference in $country $Month , conference alerts $country $Month, conference alerts in $country $Month";

		}
		
		
		

function country_keyword($country)
		{
		global $link2;
		if(isset($_REQUEST['Month']))
		{
		$Month=$_REQUEST['Month'];
		
			$date=url_special_char(str_xss($Month));
			$ev_start_date=date('F Y', strtotime($Month));
		$Month=$ev_start_date;
		}
		else $Month="";
		
		$country=str_xss($country);
		//$cc=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `country` WHERE `country` ='$country'"));
		//echo "conferencealert 2017, Conference alert 2017".$cc['keyword']." ".$country."Main Conference Alerts ,  conference alerts 2017,conferencealerts 2017, Conference alerts 2017";
		echo "Upcoming Conferences in $country $Month , conferencealerts 2018 $Month , conference alerts 2017 $Month, Conferencealert 2018 $Month, Conference alert 2017 $Month,conference in $country $Month, conference alerts $country $Month, conference alerts in $country $Month";
		}		


function country_desc($country)
		{
			global $link2;		
		$country=str_xss($country);
		
				
		if(isset($_REQUEST['Month']))
		{
		$Month=$_REQUEST['Month'];
		
			$date=url_special_char(str_xss($Month));
			$ev_start_date=date('F Y', strtotime($Month));
		$Month=$ev_start_date;
		}
		else $Month="";
		
		
		//$cc=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `country` WHERE `country` ='$country'"));
		echo "Academic conferences worldwide in $country $Month Upcoming Conferences in $country , conferencealerts 2017 , conference alerts 2017, Conferencealerts 2017 , Conference alert 2017,conference in $country $Month , conference alerts $country $Month, conference alerts in $country $Month";
		}




function topic_title($topic)
		{
		
		global $link2;
		$topic=str_xss($topic);
		$tempp_top=explode("###",$topic);		
		$topic=$tempp_top[0];
		
		$cc=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `event_cat` WHERE `id` ='$topic'"));
		if($cc['title']=="")
		{
		
		echo "MC - Main Conference Alerts : Upcoming Conferences on ".$cc['category']." ,conferencealerts 2018 , conference alerts 2018, Conferencealert 2018 , Conference alert 2018 , conference alerts ".$cc['category'];
		}
		else 
		//echo "2017 And 2017 Upcoming Conferences Worldwide in ".$cc['title']." Main Conference Alerts : conferencealerts 2017, Conference alerts 2017";
		echo "Upcoming Conferences on $topic, conferencealerts 2018 , conference alerts 2017, Conferencealert 2018 , Conference alert 2017 , conference alerts $topic";
		}
	

function topic_keyword($topic)
		{
			global $link2;
		
		$topic=str_xss($topic);
		$tempp_top=explode("###",$topic);		
		$topic=$tempp_top[0];
		
				$cc=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `event_cat` WHERE `id` ='$topic'"));		
				if($cc['keyword']=="")
				{		
				echo "Upcoming Conferences on ".$cc['category'].", conferencealerts 2017 , conference alerts 2017, Conferencealert 2017 , Conference alert 2017 , conference alerts, conference alerts ".$cc['category'];
				}
				else 
				echo $cc['keyword'] ."Upcoming Conferences on ".$cc['category'].", conferencealerts 2017 , conference alerts 2017, Conferencealert 2017 , Conference alert 2017 , conference alerts, conference alerts ".$cc['category'];;
		}		


function topic_desc($topic)
		{
		
		global $link2;
		$topic=str_xss($topic);
		$tempp_top=explode("###",$topic);		
		$topic=$tempp_top[0];
		
		$cc=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `event_cat` WHERE `id` ='$topic'"));
		
		if($cc['description']=="")
		{
		
		echo "2017 Upcoming Conferences Worldwide on ".$cc['category']." . Or add your event for free with us, Main Conference Alerts : conferencealerts 2017, Conference alerts 2017, Conference alerts 2017";
		}
		else 
		echo $cc['description'];
		}

function society_title($society)
{
	global $link2;
$dd=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `org_society` WHERE `society`='$society'"));
	return($dd['title']);
}

function society_desc($society)
{
	global $link2;
$dd=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `org_society` WHERE `society`='$society'"));
return($dd['description']);
}

function society_check($society)
{
	global $link2;
$dd=mysqli_num_rows(mysqli_query($link2,"SELECT * FROM `org_society` WHERE `society`='$society'"));
if($dd>=1) return("YES");
else return("NO");
}


function society_logo($society)
{
	global $link2;
$dd=mysqli_fetch_array(mysqli_query($link2,"SELECT * FROM `org_society` WHERE `society`='$society'"));
return($dd['logo']);
}


/*function check_listed($url)
{
$query_pag_data1 = "SELECT * FROM `event` where	`web_url` like '%$Keyword%'	 and `event_stat` > curdate() ORDER BY `event_stat` ASC";
$result_pag_data1 = mysqli_query($link2,$query_pag_data1);

$cnt_url=mysqli_num_rows($result_pag_data1);
if($cnt_url==0)return "Not Listed";
else return "<span class='inv'>Listed  - $cnt_url</span>";
}*/



function special_rp($str)
{
$test_sp = $str;
$array_sp = array(
				'(',
				')',
				'sleep',
				'/',
				'XOR',
				'sysd',
				'sysdate',
				'update',
				'delete',
				'`',				
				'+',
				'=',
				"'",
				"*",
				);
$positions = array();

foreach ($array_sp as $char) {
	$pos = 0;
	while ($pos = strpos($test_sp, $char, $pos)) {
		$positions[$char][] = $pos;
		$pos += strlen($char);
	}
}
//echo "<br>";
//print_r($positions);
 $new_str= str_replace($array_sp, '', $test_sp);
return ($new_str);
}


function check_conference_banner($ev_id)
{
	global $link2;

$tt=mysqli_query($link2,"SELECT * FROM `promote` WHERE (`event_id`='$ev_id' and `promote_type`='CONFERENCEBANNER' and `status`='ACCEPT') ORDER BY `promote_id` DESC");
 $cc=mysqli_num_rows($tt);
	if($cc>0)
	{
	$dwt=mysqli_fetch_array($tt);
	return ($dwt['banner']);	
	}
	else 
	return ("conference.jpg");
	
}

function chk_cover($img_id)
	{
		global $link2;
	if(	mysqli_num_rows(mysqli_query($link2,"SELECT * FROM `album` WHERE `cover_image`='$img_id'")))
		{
		return('cover_image');
		}
	}	
?>

