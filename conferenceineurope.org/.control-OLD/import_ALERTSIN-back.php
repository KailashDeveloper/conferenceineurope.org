<?php
ob_start();
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include('mysqli_dbconn.php');
$sql_last_import_detail=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `import_detail` where `id` = '3'"));

echo $last_import_id=$sql_last_import_detail['last_import_id'];

include('import_db_in.php');
include("import_fun.php");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<script language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script language="javascript" src="js/search.js"></script>

<link rel="stylesheet" type="text/css" href="css/admin.css"  />
<link rel="stylesheet" type="text/css" href="css/vmenu.css" />

<link rel="stylesheet" type="text/css" href="css/sddm.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/pagi.css" />





<script>
function details_all(id)
	{
	
		
		if($('#ln_'+id).text()=='View')
		{				
		$('#ln_'+id).html("Hide");
		$('#ln_'+id).addClass('view_text');
		$('#det_'+id).html("<img src='images/loading.gif' width='40' height='40' />");	
		$.get("inv_ev_detail_all.php",{ev_id:id},function(d){$("#det_"+id).html(d)});
		}
		
		else if($('#ln_'+id).text()=='Hide')
		{
		$('#ln_'+id).text('View');
		$('#ln_'+id).addClass('hidetext');
		$('#det_'+id).html("");
		}	
				
	}
	

</script>




<script type="text/javascript">
function checkAll(formname, status)
{
 $(':checkbox').prop("checked", status);
}




</script>



<?php //include('analytics.php');?>
</head>

<body>


<div id="fade" class="black_overlay"></div>
        <div id="light" class="white_content">

		</div>
       


 
	

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" bgcolor="#f5f5f5" >
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
            <td height="37" align="center" class="inner_welcome">New Event Details </td>
          </tr>
          
          <tr>
            <td>
            
            
            
            
           
            
		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="import_tabb">
              <tr>
                <td width="3%" align="center" class="tab_header1">
				
				<a href="javascript:void();" onclick="javascript:checkAll('event_table', true);"><img src="images/checked.png" /></a><a href="javascript:void();" onclick="javascript:checkAll('event_table', false);"></a>				</td>
                <td width="2%" align="center" class="tab_header1"><a href="javascript:void();" onclick="javascript:checkAll('event_table', false);"><img src="images/uncheck.png" /></a></td>
                <td width="9%" align="center" class="tab_header1">Event Id</td>
                <!--<td width="6%" align="center" class="tab_header1">Event Type </td>-->
                <td width="6%" align="center" class="tab_header1">Organiser</td>
                <td width="10%" align="center" class="tab_header1">Event Topic </td>
                <td width="15%" align="center" class="tab_header1">Event Name </td>
                <td width="11%" align="center" class="tab_header1">Country</td>
                <td width="8%" align="center" class="tab_header1">Website</td>
                <td width="13%" align="center" class="tab_header1">Event Dates </td>
                <td width="9%" align="center" class="tab_header1">Post Date </td>
                <td colspan="2" align="center" class="tab_header1">Action</td>
              </tr>
              
  
			  
			  
 <?php

 
 $event_id="";
 $query_pag_data = "SELECT * FROM `event` join `org_detail` where (`event`.`org_id`=`org_detail`.`org_id`)
and (`event`.`event_stat` > curdate() and `event`.`event_id` > '$last_import_id' ) and `event`.`org_id` ='1'   order by `event`.`event_id` ASC limit 0,100";


$result_pag_data = mysqli_query($link2,$query_pag_data) or die('MySql Error' . mysqli_error());
echo mysqli_num_rows($result_pag_data);

			  $link_new_ev=$result_pag_data;
			  
			  $i=0;
			  while($new_ev_data=mysqli_fetch_array($link_new_ev))
			  	{
			
			$event_id= $new_ev_data['event_id'];
				
					
		$i=$i+1;
		if($i%2==0)
		{
		$class="tab_bg1";
		}
		else $class="tab_bg2";			
						
								
			  ?>
			              

              <tr class="<?php echo $class; ?>">
                <td colspan="2" align="center">
                  
                  <input type="checkbox" name="content1[]" class="ads_Checkbox" value="<?php echo  $new_ev_data['event_id']; ?>">                </td>
                <td align="center"><?php echo $new_ev_data['event_id']; ?></td>
                <!--  <td align="center"><?php  //echo event_type($new_ev_data['event_type']); ?></td>-->
                <td align="center"><?php echo  org_detail($new_ev_data['org_id']); ?></td>
                <td align="center"><?php echo  event_topic($new_ev_data['event_topic']); ?></td>
                <td align="center"><?php echo $new_ev_data['event_name']; ?></td>
                <td align="center" ><?php echo event_country($new_ev_data[5]); ?></td>
                <td align="center" style="font-size:12px"><?php echo event_url($new_ev_data['web_url']); ?></td>
                <td align="center" class="dt"><?php 
				
				echo date('d.M.Y', strtotime($new_ev_data['event_stat']))."<br>To<br>".date('d.M.Y', strtotime($new_ev_data['event_end']));
				
				
				 ?></td>
                <td align="center"><span class="dt">
                  <?php 
				
				echo date('d.M.Y', strtotime($new_ev_data['date_post']));
				
				
				 ?>
                </span></td>
                <td width="7%" align="center"><a href="javascript:void(0);"  name="<?php  echo $new_ev_data['event_id']; ?>" id="ln_<?php  echo $new_ev_data['event_id']; ?>" class="link" onclick="details_all(this.name);"><div id="ln_<?php  echo $new_ev_data['event_id']; ?>">View</div></a></td>
                <td width="7%" align="center" id="IMP_<?php  echo $new_ev_data['event_id']; ?>">
				<div>
				
				<script >
				
									$(function(){		   
									$('#MULTI_'+<?php  echo $new_ev_data['event_id']; ?>).submit(function(e){							
									e.preventDefault();
									var form=$(this);
									var post_data=form.serialize();
									var post_url=form.attr('action');
									$('#IMP_'+<?php  echo $new_ev_data['event_id']; ?>).html("loading"); 
									$.ajax({
									type:"POST",
									url:post_url,
									data:post_data,
									success:function(msg){$('#IMP_'+<?php  echo $new_ev_data['event_id']; ?>).html(msg);}
									
									});  
									
								//$.get("allconf_sta_up.php",{ev_id:<?php  echo $new_ev_data['event_id']; ?>},function(d){$('#IMP_'+<?php  echo $new_ev_data['event_id']; ?>).html(d)});
									
									});
									});
				</script>
				
				
				
				<form name="MULTI_<?php  echo $new_ev_data['event_id']; ?>" id="MULTI_<?php  echo $new_ev_data['event_id']; ?>" action="import_process.php" method="post">
				
				
<input type="hidden" name="event_id" id="event_id" value="<?php  echo $new_ev_data['event_id']; ?>" >

<input type="hidden" name="event_topic" id="event_topic" value="<?php  echo $new_ev_data['event_topic']; ?>" >

<input type="hidden" name="event_type" id="event_type" value="<?php  echo $new_ev_data['event_type']; ?>" >

<input type="hidden" name="event_name" id="event_name" value="<?php  echo $new_ev_data['event_name']; ?>" >





<input type="hidden" name="country" id="country" value="<?php  echo $new_ev_data[5]; ?>" >

<input type="hidden" name="state" id="state" value="<?php  echo $new_ev_data[6]; ?>" >

<input type="hidden" name="city" id="city" value="<?php  echo $new_ev_data[7]; ?>" >




<input type="hidden" name="org_society" id="org_society" value="<?php  echo $new_ev_data['org_society']; ?>" >

<input type="hidden" name="contact_person_event" id="contact_person_event" value="<?php  echo $new_ev_data['contact_person_event']; ?>" >

<input type="hidden" name="event_enq_email" id="event_enq_email" value="<?php  echo $new_ev_data['event_enq_email']; ?>" >

<input type="hidden" name="web_url" id="web_url" value="<?php  echo $new_ev_data['web_url']; ?>" >

<input type="hidden" name="event_stat" id="event_stat" value="<?php  echo $new_ev_data['event_stat']; ?>" >


<input type="hidden" name="event_end" id="event_end" value="<?php  echo $new_ev_data['event_end']; ?>" >

<input type="hidden" name="abstract_deadline" id="abstract_deadline" value="<?php  echo $new_ev_data['abstract_deadline']; ?>" >

<input type="hidden" name="short_desc" id="short_desc" value="<?php  echo $new_ev_data['short_desc']; ?>" >

<input type="hidden" name="keywords" id="keywords" value="<?php  echo $new_ev_data['keywords']; ?>" >



				
		
				
				
				<input type="submit" name="" id="<?php  echo $new_ev_data['event_id']; ?>"   value="IMPORT" />
				</form>
				</div>
				<div id="rep_<?php  echo $new_ev_data['event_id']; ?>"></div>
				</td>
              </tr>
			  
			    <tr>
                <td colspan="13"> <div id="det_<?php  echo $new_ev_data['event_id']; ?>"></div>                </td>
                </tr>
			 <?php
			
			 }
			 ?> 
              <tr>
                <td colspan="13">
                
                
                Last Event Id = 
                <?php 
				 
				if($event_id >$last_import_id)
				{
					//include('mysqli_dbconn.php');
					
					
	    echo $event_id;		
		mysqli_query($link,"UPDATE `import_detail` SET `last_import_id` = '$event_id' WHERE `id` = 3;");
				
				}
				?>
                
                
                </td>
                </tr>
              <tr>
                <td colspan="3"><label>
                  <input name="Delete" type="submit" id="Delete" value="Delete Events" />
                </label></td>
                <td colspan="2">
                <input type="button" id="save_value" name="save_value" value="Submit Events" onclick="javascript:set_status();" /></td>
                <td>
                
                
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
              </tr>
            </table>
		
     
			
            <script language="javascript">
			
			function set_status()
{
   var ev_id_list="";
    $('.ads_Checkbox:checked').each(function(){
	ev_id_list=ev_id_list+"#"+$(this).val();
    });
//	$.get('import_multiple.php',{ev_id_list:ev_id_list},function(d){$('#light').html(d);});
	//document.getElementById('light').style.display='block';
///	document.getElementById('fade').style.display='block';	
	
	//alert(ev_id_list);
	
		var myStr = ev_id_list;
		var strArray = myStr.split("#");
		
		function form_submit_d()
		{		 
			var arr_len= strArray.length;
			arr_len = arr_len-1;

			if(arr_len>0)
			{
			var form_no=strArray[arr_len];	
			//alert(form_no);	
			$( "#MULTI_"+form_no).submit();			
			//document.getElementById("MULTI_"+form_no).submit();

			strArray.pop();
			setTimeout(form_submit_d,10000);
			}
		}

form_submit_d();	
	
	
	
	
}

	

	
	

			</script>
                
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
    <td height="100" colspan="3"  ><div class="copyright">Copyright &copy; 2013, All Rights Reserved, Powered By &nbsp; Conferencealerts</div></td>
  </tr>
</table>

</body>
</html>
