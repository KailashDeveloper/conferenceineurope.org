<?php
ob_start();
if (!isset($_SESSION))session_start();
if($_SESSION['LOGIN_TYPE']!='ORGANIZER')
{
header("location:index.php");
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Organizer Panel</title>
      <?php
	  include('script.php');
	  ?>
	  
          <script language="javascript" src="js/jq1.js"></script>
     <link type="text/css" href="css/jquery.datepick.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.datepick.js"></script>


    <?php
            $org=$_SESSION['LOGIN_USER'];
            $sql_det=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_mail`='$org'"));
            $org_id=$sql_det['org_id'];
            ?>
            
			<?php
            $ev_id = url_special_char(str_xss($_REQUEST['ed_id']));            
            $sql_ev_det=mysqli_query($link,"SELECT * FROM `event` WHERE `event_id` ='$ev_id'");            
            $ev_det=mysqli_fetch_array($sql_ev_det);            
            extract($ev_det);
			?>
    </head>
<body>

  <?php
   include('header_menue.php');
   ?>
  
      
     <section class="home-banner inr-bnr">

            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h1> Organizer Panel </h1>
                        <!--<p> Click here to add your conference to CIB worldwide listing or to create an conference organiser account.</p>-->
                    </div>
                    <div class="col-md-2"></div>
                </div>


            </div>

        </section> 
      
      
      
      
      
	  <section class="inr-body"> 
            <div class="container">
                <div class="inr-body-content">
                    <div class="row">
                        <div class="col-md-3 pull-right">
						<?php
                        include('org_menu.php');
                        ?>
                        </div>

                        <div class="col-md-9 pull-left">
                            <div class="inr-right-sec">
                            
                            <div class="inr-up-cmng-evnt-box mbt40 page_hed">
                             <h2>  Edit Event</h2>
                             </div>
                            
                            
                                <div class="inr-up-cmng-evnt-box mbt40">
                            
                            <div class="page_addevent">
                            
                            
                            <form action="event_ed.php" method="post" enctype="multipart/form-data" name="add_event" id="add_event">
                        <input type="hidden" name="org_id" value="<?php echo $sql_det['org_id']; ?>"  />
                         <input type="hidden" name="ev_id" value="<?php echo $ev_id; ?>"  />

                        <div class="organizer-detail">
                        <div class="oraganizer-name">
                           <h5>Event Organizer Details </h5> 
                           
                            <h6><span class="left-info-grid col-md-3"> Organizer Name * </span>
                            <span class="orgnz-name col-md-9"> <?php echo $sql_det['org_mail']; ?> </span></h6>
                            
                            <h6><span class="left-info-grid col-md-3"> Name of Organization * </span>
                            <span class="orgnz-name col-md-9"> <?php echo $sql_det['orginisation_name']; ?> </span></h6>
                            
                            <h6><span class="left-info-grid col-md-3"> Organizer Email * </span>
                            <span class="orgnz-name col-md-9"><?php echo $sql_det['org_mail']; ?> </span></h6>
                            
                         
                           </div>
                        
                        
                        
                         <h4>Add Event Detail</h4>    
                         <div class="confre-info-detl"> 
                               
                           
                         
                         <div class="event-detl">
                           <h5> Event Details </h5> 
                           
                             <h6><span class="event-left-grid col-md-3"> Event name * </span>
                             <span class="orgnz-textbox col-md-9"> 
                              <input name="event_name" type="text" class="form-control" id="event_name"   value="<?php echo  $ev_det['event_name']; ?>" /> 
                             </span></h6> 
                             
                             
                             
                             
                                <h6><span class="event-left-grid col-md-3"> Event type * </span>
                             <span class="orgnz-textbox col-md-9"> 
                             
                        <select name="event_type" class="form-control" id="event_type">
                  <option  option value="1" <?php if($ev_det['event_type']==1) echo "selected='selected'"; ?> >Conference</option>

                      <option value="2" <?php if($ev_det['event_type']==2) echo "selected='selected'"; ?>>Seminar</option>

                      <option value="3" <?php if($ev_det['event_type']==3) echo "selected='selected'"; ?>>Workshop</option>

                      <option value="5" <?php if($ev_det['event_type']==5) echo "selected='selected'"; ?>>Webinar</option>

                      <option value="9" <?php if($ev_det['event_type']==9) echo "selected='selected'"; ?>>Continuing professional development event</option>

                      <option value="10" <?php if($ev_det['event_type']==10) echo "selected='selected'"; ?>>Online conference</option>

                  </select>  
                             </span></h6>
                             
                            
                            
                            
                               <h6><span class="event-left-grid col-md-3"> Event Category * </span>
                             <span class="orgnz-textbox col-md-9"> 
                                <select name="evt_cat" class="form-control" id="evt_cat" onChange="topic_js(this.value)">
                    <option value="0">Select One Category</option>
                    <?php
				  $sql_cat=mysqli_query($link,"SELECT * FROM `event_cat`");
				  while($cat_data=mysqli_fetch_array($sql_cat))
				  {
				   ?>
                      <option  value="<?php echo $cat_data['id']; ?>" <?php if(event_cat_id($ev_det['event_topic'])==$cat_data['id']) echo "selected='selected'"; ?> ><?php echo $cat_data['category']; ?></option>

                    <?php
					}
					?>
                  </select>
                             </span></h6> 
                              
                             
                              <h6><span class="event-left-grid col-md-3"> Event Topic * </span>
                             <span class="orgnz-textbox col-md-9"> 
                                <div id="topic_det"> 
                                <select name="evt_topic"  class="form-control" id="evt_topic">
                    <option value="<?php echo $ev_det['event_topic']; ?>" ><?php  echo event_topic($ev_det['event_topic']); ?></option>
                  </select>
                                </div>
                             </span></h6> 
                             
                             
                       
                       
                                <h6><span class="event-left-grid col-md-3"> Country * </span>
                             <span class="orgnz-textbox col-md-9"> 
                               
                                <select name="country" class="form-control" id="country">
                    <option  value="0">Choose Country</option>
                    <?php
				  $sql_con=mysqli_query($link,"SELECT * FROM `country` ORDER BY `country` ASC");
				  while($con_data=mysqli_fetch_array($sql_con))
				  {
				   ?>
                    <option  value="<?php echo $con_data['id']."#".$con_data['country']; ?>"  <?php if(event_country_id($ev_det['country'])==$con_data['id']) echo "selected='selected'"; ?>><?php echo $con_data['country']; ?></option>
                    <?php
				   }
				   ?>
                  </select>
                               
                             </span></h6>       
                             
                             
                             
                             
                             
                              <h6><span class="event-left-grid col-md-3"> State or Province * </span>
                             <span class="orgnz-textbox col-md-9"> 
                              
                               <input name="state" type="text" class="form-control" id="state" maxlength="100"   value="<?php echo $ev_det['state']; ?>"/>
                            
                             </span></h6> 
                           
                           
                           
                             <h6><span class="event-left-grid col-md-3"> City * </span>
                             <span class="orgnz-textbox col-md-9"> 
                               
                                <input name="city" type="text" class="form-control" id="city" maxlength="100"  value="<?php echo $ev_det['city']; ?>"/>
                             
                             </span>
                             </h6>
                               
                          
                          
                          
                           <h6><span class="event-left-grid col-md-3"> Organizing society * </span>
                             <span class="orgnz-textbox col-md-9"> 
                              
                                <input name="org_society" type="text" class="form-control" id="org_society" maxlength="255" value="<?php echo $ev_det['org_society']; ?>"  />
                             
                             </span>
                             </h6>
                          
                        
                        
                          <h6><span class="event-left-grid col-md-3"> Contact person for event * </span>
                             <span class="orgnz-textbox col-md-9"> 
                               
                               <input name="ev_contact_p" type="text" class="form-control" id="ev_contact_p" maxlength="100"  value="<?php echo $ev_det['contact_person_event']; ?>"  />
                             </span>
                             </h6>
                         
                         
                            <h6><span class="event-left-grid col-md-3"> Event Enquiries email ID * </span>
                             <span class="orgnz-textbox col-md-9"> 
                                
<input name="ev_enq_email" type="text" class="form-control" id="ev_enq_email" maxlength="150"   value="<?php echo $ev_det['event_enq_email']; ?>" />                                
                             </span>
                             </h6>
                             
                             
                              <h6><span class="event-left-grid col-md-3"> Website address * </span>
                             <span class="orgnz-textbox col-md-9"> 
                                
<input name="ev_url" type="text" class="form-control" id="ev_url"  maxlength="250" value="<?php echo $ev_det['web_url']; ?>" />                                
                             </span>
                             </h6>
                              
                              
                                <h6><span class="event-left-grid col-md-3"> Event Start Date * </span>
                             <span class="orgnz-textbox col-md-9"> 
                                
<input name="ev_start_date" type="text" class="form-control" id="ev_start_date" readonly  value="<?php echo $ev_det['event_stat']; ?>"  />															
							<script type="text/javascript">
							$(function() {
							$('#ev_start_date').datepick({dateFormat: 'yyyy-mm-dd'});							
							});
							
							</script>
                                
                             </span>
                             </h6>  
                              
                              
                              
                                 <h6><span class="event-left-grid col-md-3"> Last Day of Event * </span>
                             <span class="orgnz-textbox col-md-9"> 
                               
<input name="ev_end_date" type="text" class="form-control" id="ev_end_date" onChange="checkNewEventEndDate()" readonly value="<?php echo $ev_det['event_end']; ?>" />					
					<script type="text/javascript">
							$(function() {
							$('#ev_end_date').datepick({dateFormat: 'yyyy-mm-dd'});
							});
					</script>	
                                
                             </span>
                             </h6> 
                             
                             
                             
                             <h6><span class="event-left-grid col-md-3"> Deadline for Abstracts/Proposals * </span>
                             <span class="orgnz-textbox col-md-9"> 
                               
<input name="dead_abst" type="text" class="form-control" id="dead_abst" readonly  onclick="dt();"  value="<?php echo $ev_det['abstract_deadline']; ?>" />                    
                    <script type="text/javascript">
                        $(function() {
                        $('#dead_abst').datepick({dateFormat: 'yyyy-mm-dd'});
                        });
                    </script>	
                                
                             </span>
                             </h6> 
                             
                         
                         
                         
                         <h6><span class="event-left-grid col-md-3"> Short Description of Event * </span>
                             <span class="orgnz-textbox col-md-9"> 
                                 
<textarea name="ev_desc" class="form-control"   id="ev_desc" onKeyUp="countChar(this)"><?php echo $ev_det['short_desc']; ?></textarea>           
	
                               
                             </span>
                             </h6> 
                        
                        
                        
                         <h6><span class="event-left-grid col-md-3"> Event keywords * </span>
                             <span class="orgnz-textbox col-md-9"> 
                                 <?php
                    include('all_topic_checkbox.php');
                    ?>	
                    
                    <?php                    
                    $tt_top=explode("#", $ev_det['keywords']);                     
                    ?>
                    
					<script language="javascript">                    
                    <?php                    
                    for($i=0;$i<sizeof($tt_top);$i++)                    
                    {                    
                    ?>                    
                    $(":checkbox[value='<?php echo $tt_top[$i]; ?>']").attr("checked","true");                    
                    <?php
                    }                    
                    ?>
                    
                   $("#chk_val_data").val("<?php echo $keywords; ?>");
                    
                    </script>    
                             </span>
                             </h6> 
                        
                        
                        
                         
                         
                                    
                           
                           
                           
                   <h6><span class="event-left-grid col-md-3"> </span>
                             <span class="orgnz-textbox col-md-9"> 
                    <input type="image" name="imageField2" src="images/submit.png" />
                             </span>
                             </h6>         
                           
                           <div id="load" align="left"> </div> 
                        </div>
                        </div>
					 </div>
                     </form>
                            
                            </div>
                            
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
