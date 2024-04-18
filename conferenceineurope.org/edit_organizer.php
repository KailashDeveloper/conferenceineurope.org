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

                       <script language="javascript">
		
$(function(){
		   
$('#org_edit').submit(function(e){							   
e.preventDefault();
var form=$(this);
var post_data=form.serialize();
var post_url=form.attr('action');
$('#org_load').html("loading");
 
 if(val_o())
 {
  $.ajax({
  type:"POST",
  url:post_url,
  data:post_data,
  success:function(msg){$('#org_load').html(msg);}
  });
  }  
 else  
  $('#org_load').html("Please Fill All The form Detail");  
  });
  });	




function val_o()
	{
 $('#contact_err').html("");
 $('#org_err').html("");
 $('#org_em_er').html("");
 
 var str=document.org_edit.contact_name.value;		// Organizer Name Validation
		var stringSplitArray = str.split(" ");
		var j = 0;
		for(j = 0; j < stringSplitArray.length; j++)
		{
  		//alert(stringSplitArray[j]);
				if(!/^[A-Za-z"."" " ]{1,30}$/.test(stringSplitArray[j])) // name validation
				{				 
					alert("Invalid Conatct Name Please Re Enter");
					$('#contact_err').html("Please Enter A Valid Conatct Name");

					document.org_edit.contact_name.focus();
					error=1;
					return false;	
				 }
		}
				
	////////
	////////Name of Organization  Validation
	
		var str1=document.org_edit.orgn_name.value;		
		var stringSplitArray = str1.split(" ");
		var j = 0;
		for(j = 0; j < stringSplitArray.length; j++)
		{
  		//alert(stringSplitArray[j]);
				if(!/^[A-Za-z"."","" " ]{1,30}$/.test(stringSplitArray[j])) // name validation
				{				 
					alert("Invalid Organization Name Please Re Enter");
					$('#org_err').html("Please Enter A Valid Organization Name");

					document.org_edit.orgn_name.focus();
					error=1;
					return false;	
				 }
		}
	
return true;
 
	}

</script>


<div class="inr-up-cmng-evnt-box mbt40">
<form name="org_edit" id="org_edit" enctype="multipart/form-data" action="org_ed.php" method="post">
<input type="hidden" name="org_id" value="<?php echo $org_id; ?>"  />
  <table width="100%"  class="table">
    <tr>
      <td width="24%" class="form_menu"><span id="topicHeading">Organizer Name <span class="errorText">*</span></span></td>
      <td width="0%">&nbsp;</td>
      <td width="22%"><input name="contact_name" type="text" class="form_text" id="contact_name" maxlength="100" value="<?php echo $sql_det['contact_person_name']; ?>" /></td>
      <td width="21%"><div class="in_error" id="contact_err"></div></td>
      <td width="33%" rowspan="3" align="center"></td>
    </tr>
    <tr>
      <td class="form_menu"><span id="topicHeading">Name of Organization<span class="errorText"> *</span></span></td>
      <td>&nbsp;</td>
      <td><input name="orgn_name" type="text" class="form_text" id="orgn_name" maxlength="150"  value="<?php echo $sql_det['orginisation_name']; ?>"/></td>
      <td><div class="in_error" id="org_err"></div></td>
    </tr>
    
    <tr>
      <td class="form_menu">&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <input type="image" name="imageField" src="images/submit.png"/>
        </td>
      <td><input type="hidden" name="hid_logo" value="<?php echo $sql_det['logo']; ?>" /></td>
    </tr>
    <tr>
      <td colspan="5" class="form_menu"><div id="org_load">
	  </div></td>
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
