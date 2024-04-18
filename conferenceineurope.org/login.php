<?php
ob_start();
session_start();
if(isset($_SESSION['LOGIN_TYPE'])and $_SESSION['LOGIN_TYPE']=='ORGANIZER')
{
header("location:organizer.php");
}
?>
<!DOCTYPE html>

<html>
    <head>
        <!--<title>Conference In Europe Login</title>-->
      <?php
	  include('script.php');
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
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="login-form-sec ">
                                <div class="clr-bord-line-top"></div>
                                
                                <div class="login-form" >
                                <form class="" action="login_process.php" method="post" id="loginForm">
                                    <div class="form-group">
                                        <input type="text" class="login-fld" placeholder="Email Id" name="user_id" id="user_id">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="login-fld" placeholder="Password" name="log_pass"  id="log_pass">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="login-btm" >Login</button>
                                        </div>
                                        
                                        
                                        <div class="col-md-6">
                                            <div class="forgot-txt" data-toggle="collapse" data-target="#Forgot"> Forgot Password?</div>

                                        </div>
                                    </div>
                                    
                                   </form> 
                                   
                                   <?php
								   include('forgot.php');
								   ?>
                                    
                                    
                                    
                                    <p> <a href="#"> Click Here </a> to  Register</p>
                                    
                                    
                                     <div id="log_load" style="width:50%;float:right;color: #ff2d54;font-size: 19px;"></div>
                               </div>
                                <div class="clr-bord-line-bottom"></div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>

                    </div>
                </div>
            </div>

        </section>
      
 
        <?php
	   include('footer.php');
	   ?>










    </body>
</html>
