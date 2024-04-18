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
                             <h2>   Organizer Add Events </h2>
                             </div>
                            
                            <div class="inr-up-cmng-evnt-box mbt40">
                            
                            <div class="page_addevent">
                            
                            
                            
                            <form action="ev_ad1.php" method="post" enctype="multipart/form-data" name="add_event" id="add_event">

                        <input type="hidden" name="org_id" value="<?php echo $sql_det['org_id']; ?>"  />



                        <div class="organizer-detail">

                        <div class="oraganizer-name">

                           <h2>Event Organizer Details </h2> 

                           

                            <h6><span class="left-info-grid col-md-3"> Organizer Name * </span>

                            <span class="orgnz-name col-md-9"> <?php echo $sql_det['org_mail']; ?> </span></h6>

                            

                            <h6><span class="left-info-grid col-md-3"> Name of Organization * </span>

                            <span class="orgnz-name col-md-9"> <?php echo $sql_det['orginisation_name']; ?> </span></h6>

                            

                            <h6><span class="left-info-grid col-md-3"> Organizer Email * </span>

                            <span class="orgnz-name col-md-9"><?php echo $sql_det['org_mail']; ?> </span></h6>

                            

                         

                           </div>

                        

                        

                        

                         <h2>Add Event Detail</h2>    

                         <div class="confre-info-detl"> 

                               

                           

                         

                         <div class="event-detl">

                           

                           

                             <h6><span class="event-left-grid col-md-3"> Event name * </span>

                             <span class="orgnz-textbox col-md-9"> 

                              <input name="event_name" type="text" class="form-control" id="event_name"  /> 

                             </span></h6> 

                             

                             

                             

                             

                                <h6><span class="event-left-grid col-md-3"> Event type * </span>

                             <span class="orgnz-textbox col-md-9"> 

                             <select name="event_type" class="form-control" id="event_type">

                        <option selected="selected" value="1">Conference</option>

                      <option value="2">Seminar</option>

                      <option value="3">Workshop</option>

                      <option value="5">Webinar</option>

                      <option value="9">Continuing professional development event</option>

                      <option value="10">Online conference</option>

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

                                <option  value="<?php echo $cat_data['id']; ?>"><?php echo $cat_data['category']; ?></option>

                                <?php

                                }

                                ?> 

                                </select>

                             </span></h6> 

                              

                             

                              <h6><span class="event-left-grid col-md-3"> Event Topic * </span>

                             <span class="orgnz-textbox col-md-9"> 

                                <div id="topic_det"> 

                                <select name="evt_topic" disabled="disabled" class="form-control" id="evt_topic">

                                <option value="0">Select One Topic</option>

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

                                <option  value="<?php echo $con_data['id']."#".$con_data['country']; ?>"><?php echo $con_data['country']; ?></option>

                                <?php

                                }

                                ?>

                                </select>

                               

                             </span></h6>       

                             

                             

                             

                             

                             

                              <h6><span class="event-left-grid col-md-3"> State or Province * </span>

                             <span class="orgnz-textbox col-md-9"> 

                              

                                <input name="state" type="text" class="form-control" id="state" maxlength="100" />

                            

                             </span></h6> 

                           

                           

                           

                             <h6><span class="event-left-grid col-md-3"> City * </span>

                             <span class="orgnz-textbox col-md-9"> 

                               

                                <input name="city" type="text" class="form-control" id="city" maxlength="100" />

                             

                             </span>

                             </h6>

                               

                          

                          

                          

                           <h6><span class="event-left-grid col-md-3"> Organizing society * </span>

                             <span class="orgnz-textbox col-md-9"> 

                              

                                <input name="org_society" type="text" class="form-control" id="org_society" maxlength="255" />

                             

                             </span>

                             </h6>

                          

                        

                        

                          <h6><span class="event-left-grid col-md-3"> Contact person for event * </span>

                             <span class="orgnz-textbox col-md-9"> 

                               

                                <input name="ev_contact_p" type="text" class="form-control" id="ev_contact_p" maxlength="100" />

                             

                             </span>

                             </h6>

                         

                         

                            <h6><span class="event-left-grid col-md-3"> Event Enquiries email ID * </span>

                             <span class="orgnz-textbox col-md-9"> 

                                

                                <input name="ev_enq_email" type="text" class="form-control" id="ev_enq_email" maxlength="150" />

                                

                             </span>

                             </h6>

                             

                             

                              <h6><span class="event-left-grid col-md-3"> Website address * </span>

                             <span class="orgnz-textbox col-md-9"> 

                                

                                <input name="ev_url" type="text" class="form-control" id="ev_url" value="http://" maxlength="250" />

                                

                             </span>

                             </h6>

                              

                              

                                <h6><span class="event-left-grid col-md-3"> Event Start Date * </span>

                             <span class="orgnz-textbox col-md-9"> 

                                

                               <input name="ev_start_date" type="text" class="form-control" id="ev_start_date" readonly  />

															

							<script type="text/javascript">

							$(function() {

							$('#ev_start_date').datepick({dateFormat: 'yyyy-mm-dd'});							

							});

							

							</script>

                                

                             </span>

                             </h6>  

                              

                              

                              

                                 <h6><span class="event-left-grid col-md-3"> Last Day of Event * </span>

                             <span class="orgnz-textbox col-md-9"> 

                               

                               <input name="ev_end_date" type="text" class="form-control" id="ev_end_date" onChange="checkNewEventEndDate()" readonly />

					

					<script type="text/javascript">

							$(function() {

							$('#ev_end_date').datepick({dateFormat: 'yyyy-mm-dd'});

							});

					</script>	

                                

                             </span>

                             </h6> 

                             

                             

                             

                             <h6><span class="event-left-grid col-md-3"> Deadline for Abstracts/Proposals * </span>

                             <span class="orgnz-textbox col-md-9"> 

                               

                           <input name="dead_abst" type="text" class="form-control" id="dead_abst" readonly  onclick="dt();" />

                    

                    <script type="text/javascript">

                        $(function() {

                        $('#dead_abst').datepick({dateFormat: 'yyyy-mm-dd'});

                        });

                    </script>	

                                

                             </span>

                             </h6> 

                             

                         

                         

                         

                         <h6><span class="event-left-grid col-md-3"> Short Description of Event * </span>

                             <span class="orgnz-textbox col-md-9"> 

                                 

                           <textarea name="ev_desc" class="form-control"   id="ev_desc" onKeyUp="countChar(this)"></textarea>

                      <script>

						function countChar(val){

						var len = val.value.length;

						

						if (len >= 301) {

						val.value = val.value.substring(0, 300);

						} else {

						$('#charNum').html((0 + len) +"/300 Letter left");

						}

						};

					</script>	

                               

                             </span>

                             </h6> 

                        

                        

                        

                         <h6><span class="event-left-grid col-md-3"> Event keywords * </span>

                             <span class="orgnz-textbox col-md-9"> 

                                 <?php

				  include('all_topic_checkbox.php');

				  ?>

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
                                <!--<div class="inr-up-cmng-evnt-box mbt40">
                                    <div class="inr-evndid"> Event ID: COnF142059</div>

                                    <a href="#" class="inr-up-cmng-evnt-box-title"> WRFER - International Conference On Electrical and Electronics Engineering ICEEE</a>
                                    <div class="inr-evnt-box-list">
                                        <ul> 
                                            <li><i class="fa fa-calendar"></i> 2019-12-24 </li>
                                            <li><i class="fa fa-map-marker"></i> Usa  </li>
                                            <li><i class="fa fa-map-marker"></i> America </li>
                                            <li><i class="fa fa-book"></i> Electronics And Electrical  </li>
                                        </ul>
                                    </div>
                                    <a href="#" class="inr-up-cmng-evnt-link"> <i class="fa fa-chevron-right"> </i></a>

                                </div>-->



                              




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
