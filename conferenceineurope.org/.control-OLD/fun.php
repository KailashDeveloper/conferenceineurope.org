<?php
$fun=1;

function  str_xss($string)
	{
	$x = strip_tags($string);
	$xx = htmlentities($x);
	$xxx=addslashes($xx);
	return($xxx);
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
	global $link;
	$r=explode("###",$cat);
	$id=$r[0];
	$sql_ev=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `event_cat` WHERE `id`='$id'"));
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
	if($topic!="")
		{
		$r=explode("###",$topic);
		return($r[2]);
    	}
	else return($topic);
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


function  country_name_country_id($country)
	{
	global $link;
	$dd=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `country` WHERE `country` like '$country'"));
	return($dd['id']);
	}


function  event_url($url)
	{	
		
		$https =strpos( $url, 'https://' );
		$http =strpos( $url, 'http://' );
			
	if( $https !== false || $http !== false  )
		{	
			
		
					if(  $https !== false)
					{										
						$r=explode("https://",$url);												
						if(trim($r[1])=="")
						{
						$return ="<span class='inv'>Invalid Url</span>";
						}
						else 
						{	  
						$return = "<a href='https://$r[1]' target='_blank' class='valid'>View Site</a>";
						
						}	
						
					}
			
			
			
		elseif( $http !== false)
					{
						$r=explode("http://",$url);						
						if(trim($r[1])=="")
						{
						$return ="<span class='inv'>Invalid Url</span>";
						}
						else 
						{	  
						$return ="<a href='http://$r[1]' target='_blank' class='valid'>View Site</a>";
						
						}	
						
					}
		}
		
		else {			
		$return ="<span class='inv'>Invalid Url</span>";		
		}
			
	return $return;	

	}
	

function rem_sl($val)
	{
	$val=stripslashes($val);
	return($val);
	}

function url_special_char($url)
	{
	$url = preg_replace("![^a-z0-9()]+!i", " ", $url);
	$url=rtrim(ltrim($url," "));
	return($url);
	}	

function sql_inj($val)	
	{
	global $link;
	if(get_magic_quotes_gpc())
		{
		$val=stripslashes($val);
		}
	$val=mysqli_real_escape_string($link,$val);
	return($val);
	}

function  org_detail($id)
   {
   global $link;
	$dd=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_id`='$id'"));
	return($dd['orginisation_name']);
   }		

function check_row_prom($id)
    {
	global $link;
	$cc=mysqli_num_rows(mysqli_query($link,"SELECT * FROM `promote` WHERE `event_id`='$id' and `exp_date`>= curdate() and `promote_type`= 'LINEEVENT'"));
    return($cc);
    }

function check_prom($id)
    {
	global $link;
	$cc=mysqli_num_rows(mysqli_query($link,"SELECT * FROM `promote` WHERE `event_id`='$id' and `exp_date`>= curdate()"));
	return($cc);
    }

function prom_event_exist($id)
    {
	global $link;
	$cc=mysqli_num_rows(mysqli_query($link,"SELECT * FROM `promote` WHERE `event_id`='$id'"));
	return($cc);
    }

function check_duplicate_prom($id, $promotype)
    {
	global $link;
	$cc=mysqli_num_rows(mysqli_query($link,"SELECT * FROM `promote` WHERE `event_id`='$id' and promote_type = '$promotype'"));
    return($cc);
    }

function validate_valid_org($org_id)			
	{
	global $link;
	if($org_id<926)
 	{
	return 1;
	}
	else{
    $sql_v=mysqli_num_rows(mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_id`='$org_id' and `status`='Accept'"));
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
	global $link;
	$cc=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `transaction` WHERE `transaction_id`='$transaction_id'"));
	return($cc['event_id']);
	}	


function  get_ev_cat($event_topic)
	{
	global $link;
	$r=explode("###",$event_topic);
	$cat_id=$r[0];
	$cc=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `event_cat` WHERE `id`='$cat_id'"));
	return($cc['category']);
    }		

function remove_space_RL($str)
	{
	$res=ltrim(rtrim($str," ")," ");
    $res=str_xss($res);
	return($res);
	}	
	
function sp_replace($str)	
	{
	$str=str_replace(" ","-",$str);
	return($str); 
    }
	
function sp_replace_hi($str)	
	{
	//$str=url_special_char($str);
	//$str = preg_replace("![^a-z0-9()]+!i", "", $str);
	
	$str=ltrim(rtrim($str," ")," ");
	$str=str_replace(" ","-",$str);
	
	$str=str_replace("`","-",$str);
	$str=str_replace("`","-",$str);
	$str=str_replace("/","-",$str);
	$str=str_replace(",","-",$str);
	$str=str_replace("--","-",$str);
	$str=str_replace("'","-",$str);
	$str=strtolower($str);
	
	return($str); 
    }

function special_replace($str)	
	{
	$str=str_replace("/","-",$str);
	return($str); 
    }	

function state_sep($state)	
	{
	$state=explode("#",$state);
	$se=str_replace("_"," ",$state[1]);
	return($se);
	}

	
function chk_order_id($order_id)
	{
	global $link;
	$data=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `transaction` WHERE `transaction_id`='$order_id'"));	
	return($data['status']);
	}		

function orderid_to_eventid($order_id)
	{
	global $link;
	$drd=explode("-",$order_id);
	$all_payment_id=$drd[1];
	$sql_p_d=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `all_payment` WHERE `all_payment_id`='$all_payment_id'"));
	return($sql_p_d['event_id']);
	}

	
function  org_email($id)
	{
	global $link;
	$dd=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_id`='$id'"));
	return($dd['org_mail']);
    }




function qry_insert($table, $data)
   {
   global $link;
    $fields = array_keys( $data );  
    $values = array_map( "mysql_real_escape_string", array_values( $data ) );
	$qry = mysqli_query($link, "INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."');") or die( mysql_error() );
	if($qry)
	return true;
	else
	return false;
   }

function login_auth($tname,$uname,$pass,$status)
	{
	global $link;
	$sq=mysqli_query($link,"select * from `".$tname."` where `email`='".$uname."' and `password`='".$pass."' and `status`='".$status."'") or die(mysql_error());
	return $sq;
	}		


function page_redirect($page)
	{
	  header('location:'.$page);
	}	

function event_category($tname,$id)
	{
	global $link;
	 $sq=mysqli_query($link,"select * from `".$tname."` order by '".$id."'") or die(mysql_error());
	 return $sq;	
	}	



function showname_fromid($column, $table, $where="")
	{
	global $link;
	$sqlstt= "SELECT $column FROM $table ";	
	if($where != "")	
	$sqlstt .= " where ".$where;	
	$sql_qry=mysqli_fetch_array(mysqli_query($link,$sqlstt));	
	return($sql_qry["$column"]);			
	}

function chkurl($myUrl)
	{
	if(stripos($myUrl, 'http://') === 0)
	{
	$myUrl = substr($myUrl, 7); 
	}
    if(stripos($myUrl, 'www.') === 0)
	{
	$myUrl = substr($myUrl, 4); 
	}

	$myUrl = 'http://' . $myUrl;
	$myParsedURL = parse_url($myUrl);
	$myDomainName= $myParsedURL['host'];
	$ipAddress = gethostbyname($myDomainName);
	//echo "<br>";
	if($ipAddress == $myDomainName)
	{
    return "";
 	}
 	else
		{
		 return $myParsedURL['host'];
		}
	}

function meta_detail($url,$arg)
	{
	global $link;
    $url=sql_inj($url);
    $url=ltrim($url," ");
    $url=rtrim($url," ");
	$url=str_replace("%20"," ",$url);
	$meta_title="";
	$meta_keywords="";
	$meta_desc="";
	$query_pag_data = "SELECT * FROM `meta` where `url` = '$url'";
	$result_pag_data = mysqli_query($link,$query_pag_data) or die('MySql Error' . mysql_error());
    $sql_new_ev=mysqli_fetch_array($result_pag_data); 
    $chk_exist=mysql_num_rows($result_pag_data);

     if($chk_exist>0)
			{
			$meta_title=$sql_new_ev['meta_title'];
			$meta_keywords=$sql_new_ev['meta_keywords'];
			$meta_desc=$sql_new_ev['meta_desc'];
			}
		else 
			{
			$meta_title="National & International Conferences Conference Alerts";
			$meta_keywords="National & International Conferences  Conference Alerts";
			$meta_desc="Get a full list of conferences, events, seminars & workshops coming up in Bahrain. Just click on the links of conferences given below to get more details such as conference dates, venue, organizers, objective & speakers. Aspirants can submit their abstracts, manuscripts, full-length papers and posters for their preferred conferences. To list your event with All Conference Alert, visit Add Event or email to info@conferencecart.com.";
			}	
	
	if($arg=="TITLE")
		{
	  return($meta_title);
		}
	if($arg=="KEYWORDS")
		{
      return($meta_keywords);
		}
	if($arg=="DESCRIPTION")
		{
		return($meta_desc);
		//return($url);
		}
		
		
	}



function get_cuuu_url()
	{	
	$url = "https://" . $_SERVER['HTTP_HOST'] . "/" . $_SERVER['PHP_SELF']; 
	$pp= "https://" . $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
	return($pp);		
	}
	
	
	
	
	
	
	
	
	
	
	
	//$v1=1;
function  user_val($email)
	{
	global $link;
	$test=mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_mail`='$email'");
	$c=mysqli_num_rows($test);
	if($c>0)
		{
		
		return(0);
		}
		else 
		return(1);
	}
	
function  login_user_val($email,$user_type)
	{
	global $link;
	$test=mysqli_query($link,"SELECT * FROM `user_login` WHERE `user_id`='$email' and `user_type`='$user_type'");
	$c=mysqli_num_rows($test);
	if($c>0)
		{
		
		return(0);
		}
		else 
		return(1);
	}	
	
function  subsc_val($email)
	{
	global $link;
	$test=mysqli_query($link,"SELECT * FROM `subscribe` WHERE `email_id`='$email'");
	 $c=mysqli_num_rows($test);
	if($c>0)
		{
		
		return(0);
		}
		else 
		return(1);
	}	
	
	function sp_replace_hi_rev($str)
{
$str=str_replace("-"," ",$str);
$str=ucwords($str);
return($str); 
}	

?>