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
                             <h2>  Welcome Organizer </h2>
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
<?php
$org=$_SESSION['LOGIN_USER'];
$sql_det=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_mail`='$org'"));
$org_id=$sql_det['org_id'];
?>

    

<div class="inr-up-cmng-evnt-box mbt40">


<script language="javascript">
/////
	////change password 
	$(function(){		   
$('#pass_form').submit(function(e){									
e.preventDefault();
var form=$(this);
var post_data=form.serialize();
var post_url=form.attr('action');
 if(val_p())
 {
$('#pass_val').html("loading");
  $.ajax({
  type:"POST",
  url:post_url,
  data:post_data,
  success:function(msg){$('#pass_val').html(msg);}
  });
 }
  });
  });
	
	function val_p()
		{
			$('#p_err').html("");
			$('#con_p_err').html("");
			$('#old_pass_err').html("");			
			var new_pass = document.getElementById("new_pass").value
			var con_pass = document.getElementById("con_pass").value
						
						
						
						
			  	 if(!/^[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(new_pass))  // validation for email
					{
					alert("invalid Password")
					$('#p_err').html("Please Enter A Valid Password");
					document.pass_form.new_pass.focus();
					error=1;
					return false;	
					}
								
						
				 if(new_pass != con_pass)
					{
					alert('Wrong confirm password !');
					$('#con_p_err').html("Password & Confirm Password Do not  Matched");
					document.pass_form.con_pass.focus();
					return false;
					}
					
				return true;		
		}
</script>

<form action="changep.php" method="post" name="pass_form" id="pass_form">
<table width="100%"  class="table">
  <tr>
    <td colspan="5"></td>
  </tr>
  <tr>
    <td width="23%" class="form_menu">Current Password </td>
    <td width="2%">&nbsp;</td>
    <td colspan="2"><label>
      <input name="curr_pass" type="password" id="curr_pass" class="form_text">
    </label></td>
    <td width="51%"><div class="in_error" id="old_pass_err"></div></td>
  </tr>
  <tr>
    <td class="form_menu">New Password </td>
    <td>&nbsp;</td>
    <td colspan="2"><label>
    <input name="new_pass" type="password" id="new_pass" class="form_text">
    </label></td>
    <td><div class="in_error" id="p_err"></div></td>
  </tr>
  <tr>
    <td class="form_menu">Confirm Password </td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="con_pass" type="password" id="con_pass" class="form_text"></td>
    <td><div class="in_error" id="con_p_err"></div></td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="8%"><label>
      <input type="image" src="images/submit.png">
    </label></td>
    <td colspan="2"><div id="pass_val"></div></td>
    </tr>
</table>

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
