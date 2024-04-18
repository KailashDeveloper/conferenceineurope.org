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
    
    <script language="javascript" src="js/create_org.js"></script>
    
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
                             <h2>Register New </h2>
                             </div>
                            
                            
                                <div class="inr-up-cmng-evnt-box mbt40">
                            
                            <form action="org_ad.php" method="post" enctype="multipart/form-data" class="create_org" name="create_org" id="create_org">
        	        <div class="oraganizer-name">

                         

                           

                            
                             <span class="ui-input-group"> 

                             <input name="contact_name" type="text" class="form-control" id="contact_name" maxlength="100" placeholder="Organizer Name *"/> 

                             </span>

                             

                             
					<div class="height">&nbsp;</div>
                            

                             <span class="ui-input-group"> 

								<input name="orgn_name" type="text" class="form-control" id="orgn_name" maxlength="150" placeholder="Name of Organization * " />

                             </span>

                            
<div class="height">&nbsp;</div>
                             

                           

                           

                            

                             <span class="ui-input-group "> 

								<input name="org_mail" type="text" class="form-control" id="org_mail" maxlength="150" placeholder=" Organizer Email * " />

                             </span>

                   <div class="height">&nbsp;</div>        

                             

                             

                            

                             <span class="ui-input-group"> 

								<input name="pass" type="password" class="form-control" id="pass" placeholder="Password * " />

                             </span>

                            
<div class="height">&nbsp;</div>
                             

                             

                                

                             <span class="ui-input-group"> 

								<input name="con_pass" type="password" class="form-control" id="con_pass" placeholder="Confirm password" />

                             </span>

                           
<div class="height">&nbsp;</div>
                             

                             

                            

                               

                             <span class="ui-input-group"> 

								<input name="images" type="file" class="form-control" id="images" placeholder="Organization logo" />

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
<div class="height">&nbsp;</div>
                          
                   
                  

                   <span class="ui-input-group">            

              <span class="orgnz-textbox col-md-6" style="margin-left:-13px">

               <input name="captcha" type="text" class="form-control" id="captcha"  style="width:200px;" placeholder=" Security *"/> 

                  </span>
                  
                  <span class="orgnz-textbox col-md-3 "> 

              <img src="php_captcha.php"  id="imageId"/> 

              </span>

                   <span class="orgnz-textbox col-md-3">

                    <a tabindex="-1" style="border-style: none; text-decoration:none" href="javascript:void(0);" title="Refresh Image" onClick="document.getElementById('imageId').src = 'php_captcha.php?sid=' + Math.random(); return false">Refresh</a>

                    </span>

                             
                   </span>
                   
                   
                   <div id="load" align="left" class="height col-md-12"> </div> 
                   
                    <div class="login-action col-md-12"> 
                     <input type="submit" value="Submit" class="log-bttn">
                    </div>
                             

                             

                             

                             

                             

                            

                           

                           </div>
                     </form>
                            
                            
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
