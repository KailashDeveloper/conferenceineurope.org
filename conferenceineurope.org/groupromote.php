<?php
ob_start();
if (!isset($_SESSION))session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <title>conferenceineurope</title>
      <?php
	  include('script.php');
		
	  ?>
	  
<?php

$month=date("Y-m");
$cur_m=date("Y-m");

$country="";
$orgg_new="";

if(isset($_REQUEST['group']))
	{	
$group=str_xss($_REQUEST['group']);
}
else{
$group=1;
	
}


$group_datails=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `group_promote` WHERE `group_id` ='$group'"));

$listing_domain=$group_datails['listing_domain'];

$listing_country=$group_datails['country'];
$domain=$group_datails['domain'];
$event_id_list=$group_datails['event_id_list'];


if(isset($listing_country))
{
$where_country="`country` like '%$listing_country%' ";
}
else
{
$where_country="`country` like '%%' ";
}


if(isset($domain))
{
$where_domain="`web_url` like '%$domain%' ";
}
else
{
$where_domain="`web_url` like '%%' ";
}


if(trim($event_id_list)!="")
{
$event_id_list=str_replace("#",",",$event_id_list);		
$where_event_id_list="`event_id` IN ($event_id_list)";
}
else 
{
$where_event_id_list ="`event_id` like '%%'";
}


  $combine_sql="SELECT * FROM `event` WHERE ($where_country) and ($where_domain) and $where_event_id_list and `status`='Accept' and `event_stat` > curdate() ORDER BY `event_stat` ASC ";



//extract($promote_details);


function get_domain($url)
{
  $pieces = parse_url($url);
  $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    return $regs['domain'];
  }
  return false;
}


$web_url=get_domain($web_url);

?>


    </head>
    <body>

      
       <?php
	   include('header.php');
	   ?>
	  
	  <section class="inr-body"> 
            <div class="container">
                <div class="inr-body-content">
                    <div class="row">
                        <div class="col-md-3 pull-right">
						<?php
                        include('right_part.php');
                        ?>
                        </div>

                        <div class="col-md-9 pull-left">
                            <div class="inr-right-sec">
                            
                            <!--<div class="inr-up-cmng-evnt-box mbt40 page_hed">
                             <h2> Demo Heading </h2>
                             </div>
                            -->
                            <div id="loading_events">
                      
                      
                      <?php 


	$sql_con_list=mysqli_query($link,$combine_sql);
	$total_event_p=mysqli_num_rows($sql_con_list);
	
	if(mysqli_num_rows($sql_con_list)==0)
	{
	 echo "No Event Found";
	}
	
	while($accept_data=mysqli_fetch_array($sql_con_list))
	{    
	extract($accept_data);             
	 include('list_thumb.php');       
	}

?>

                      
                      
                      
                      </div>



                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section>
	 
       <?php
	   include('subscribe.php');
	   ?>
      
 
        <?php
	   include('footer.php');
	   ?>










    </body>
</html>
