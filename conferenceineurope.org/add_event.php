<?php
ob_start();
if (!isset($_SESSION))session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <!--<title>conferenceineurope</title>-->
      <?php
      
	  include('script.php');
	  ?>
      <script language="javascript" src="js/jq.js"></script>
        
        <link type="text/css" href="css/jquery.datepick.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.datepick.js"></script>	        
	  
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
                            
                            <div class="inr-up-cmng-evnt-box mbt40 page_hed">
                             <h2> Add Event | Conference In Europe</h2>
                             </div>
                            
                            
                                <div class="inr-up-cmng-evnt-box mbt40">
                       <div class="page_addevent">          
<form action="ev_ad.php" method="post" enctype="multipart/form-data" name="add_event" id="add_event">
                        <div class="orga	nizer-detail">
                          
                         <div class="confre-info-detl"> 
                               
                           <div class="oraganizer-name">
                         
                           
                            <h6><span class="event-left-grid col-md-3"> Organizer Name * </span>
                             <span class="orgnz-textbox col-md-9"> 
                             <input name="contact_name" type="text" class="form-control" id="contact_name" maxlength="100" /> 
                             </span>
                            </h6> 
                             
                             
                             <h6><span class="event-left-grid col-md-3"> Name of Organization * </span>
                             <span class="orgnz-textbox col-md-9"> 
								<input name="orgn_name" type="text" class="form-control" id="orgn_name" maxlength="150" />
                             </span>
                            </h6>
                             
                           
                           
                             <h6><span class="event-left-grid col-md-3"> Organizer Email * </span>
                             <span class="orgnz-textbox col-md-9"> 
								<input name="org_mail" type="text" class="form-control" id="org_mail" maxlength="150" />
                             </span>
                            </h6>  
                             
                             
                            <h6><span class="event-left-grid col-md-3">Password * </span>
                             <span class="orgnz-textbox col-md-9"> 
								<input name="pass" type="password" class="form-control" id="pass" />
                             </span>
                            </h6>
                             
                             
                               <h6><span class="event-left-grid col-md-3">Confirm password </span>
                             <span class="orgnz-textbox col-md-9"> 
								<input name="con_pass" type="password" class="form-control" id="con_pass" />
                             </span>
                            </h6> 
                             
                             
                            
                               <h6><span class="event-left-grid col-md-3">Organization logo</span>
                             <span class="orgnz-textbox col-md-9"> 
								<input name="images" type="file" class="form-control" id="images" />
								<script language="javascript">
                                (function () {
                                var input = document.getElementById("images"),
								formdata = false;                                
                                if (window.FormData) {
                                formdata = new FormData();                                
                                }
                                input.addEventListener("change", function (evt)
                                { 
                                $('#response').html('<img src="loader.gif" />  Uploading Please Wait...');	
                                if(!/(\.bmp|\.gif|\.jpg|\.jpeg|\.png)$/i.test(images.value)) {
                                $('#response').html('Please Upload image file only');   
                                alert("Invalid image file type.");      
                                fld.form.reset();
                                fld.focus();  						   
                                return false; 						
                                } 
                                file = this.files[0];	
                                formdata.append("images", file);
                                
                                if (formdata) {
                                $.ajax({
                                url: "upload.php",
                                type: "POST",
                                data: formdata,
                                processData: false,
                                contentType: false,
                                success: function (res) {
                                document.getElementById("response").innerHTML = res; 
                                }
                                });
                                }
                                }, false);
                                }());
                                </script>
                             </span>
                             <div class="in_error" id="response"></div>
                            </h6>     
                             
                             
                             
                             
                             
                            
                           
                           </div>
                         
                         <div class="event-detl">
                           <h4> Event Details </h4> 
                           
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
                                $sql_con=mysqli_query($link,"SELECT * FROM `country` where `region` = 'Europe' ORDER BY `country` ASC");
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
                                
                               <input name="ev_start_date_f" type="text" class="form-control" id="ev_start_date_f" readonly  />
															
							<script type="text/javascript">
							$(function() {
							$('#ev_start_date_f').datepick({dateFormat: 'yyyy-mm-dd'});							
							});
							
							</script>
                                
                             </span>
                             </h6>  
                              
                              
                              
                                 <h6><span class="event-left-grid col-md-3"> Last Day of Event * </span>
                             <span class="orgnz-textbox col-md-9"> 
                               
                               <input name="ev_end_date_f" type="text" class="form-control" id="ev_end_date_f" onChange="checkNewEventEndDate()" readonly />
					
					<script type="text/javascript">
							$(function() {
							$('#ev_end_date_f').datepick({dateFormat: 'yyyy-mm-dd'});
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
                        
                        
                        
                         
                         
                           <h6><span class="event-left-grid col-md-3"> Security * </span>
                             <span class="orgnz-textbox col-md-2"> 
              <img src="php_captcha.php"  id="imageId"/> 
              </span>
              <span class="orgnz-textbox col-md-1">
              
               <input name="captcha" type="text" class="form-control" id="captcha"  style="width:50px;"/> 
                  </span>
                   <span class="orgnz-textbox col-md-1">
                    <a tabindex="-1" style="border-style: none; text-decoration:none" href="javascript:void(0);" title="Refresh Image" onClick="document.getElementById('imageId').src = 'php_captcha.php?sid=' + Math.random(); return false">Refresh</a>
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
