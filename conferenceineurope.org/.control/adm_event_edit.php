<?php

session_start();

if(!isset($_SESSION['cart']))

{

$_SESSION['cart']=array();

}

else 

$_SESSION['cart']=array();



 include('mysqli_dbconn.php');







include("fun.php");



$ev_id=url_special_char(str_xss($_REQUEST['ev_id']));



$sql_ev_det=mysqli_query($link,"SELECT * FROM `event` WHERE `event_id` ='$ev_id'");



$ev_det=mysqli_fetch_array($sql_ev_det);







$key=$ev_det['keywords'];



$k=explode("#",$key);



for($i=0;$i<sizeof($k)-1;$i++)



	{



	array_push($_SESSION['cart'],$k[$i]);



	}











?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Admin Pannel</title>



<link rel="stylesheet" type="text/css" href="css/admin.css" />

<link rel="stylesheet" type="text/css" href="css/vmenu.css" />

<script type="text/javascript" src="js/menu.js"></script>

<link rel="stylesheet" type="text/css" href="css/sddm.css" >

<link rel="stylesheet" type="text/css" href="../css/form.css" >





<script language="javascript" src="js/jquery.min.js"></script>



<script language="javascript" src="jq1.js"></script>











</head>



<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td colspan="3" bgcolor="#f5f5f5" background="images/header-bg.jpg">

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

    <td height="461" colspan="3" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td valign="top">&nbsp;</td>

        <td align="center" valign="middle">&nbsp;</td>

      </tr>

      <tr>

        <td width="20%"  valign="top">

        <?php include('menu.php'); ?></td>

        <td width="80%" align="center" valign="top">

		

		<form action="event_ed.php" method="post" enctype="multipart/form-data" name="add_event" id="add_event">







        







		<input type="hidden" name="ev_id" value="<?php echo $ev_id; ?>"  />



		<span class="form_heading" id="topicHeading">Event details</span> <br />



            <br />



        



            <table width="100%" border="0" cellpadding="0" cellspacing="3">



                <tr>



                    <td width="17%" class="form_menu"><span id="topicHeading">Event name<span class="errorText"> *</span></span></td>



                    <td width="1%">&nbsp;</td>



                  <td width="53%"><input name="event_name" type="text" class="form_text" id="event_name" maxlength="200"  value="<?php echo  $ev_det['event_name']; ?>"/></td>



                    <td width="29%" colspan="2"><div class="in_error" id="ev_nm_err"></div></td>

                </tr>



               <tr>



                    <td class="form_menu"><span id="topicHeading">Event type<span class="errorText"> *</span></span></td>



                    <td>&nbsp;</td>



                    <td><select name="event_type" class="form_list" id="event_type">



                        <option value="1" <?php if($ev_det['event_type']==1) echo "selected='selected'"; ?> >Conference</option>



                      <option value="2" <?php if($ev_det['event_type']==2) echo "selected='selected'"; ?>>Seminar</option>



                      <option value="3" <?php if($ev_det['event_type']==3) echo "selected='selected'"; ?>>Workshop</option>



                      <option value="5" <?php if($ev_det['event_type']==5) echo "selected='selected'"; ?>>Webinar</option>



                      <option value="9" <?php if($ev_det['event_type']==9) echo "selected='selected'"; ?>>Continuing professional development event</option>



                      <option value="10" <?php if($ev_det['event_type']==10) echo "selected='selected'"; ?>>Online conference</option>



                      </select>                    </td>



                    <td colspan="2">&nbsp;</td>

              </tr>



			    



                <tr>



                  <td class="form_menu">Event Category </td>



                  <td>&nbsp;</td>



                  <td><label>



                    <select name="evt_cat" class="form_list" id="evt_cat" onchange="topic_js(this.value)">



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



					  



                  </label></td>



                  <td colspan="2"><div class="in_error" id="evt_cat_err"></div></td>

                </tr>



                <tr>



                  <td class="form_menu">Event Topic  </td>



                  <td>&nbsp;</td>



                  <td>



				 <div id="topic_det"> 



				  <select name="evt_topic" class="form_list" id="evt_topic">



                    <option value="<?php echo $ev_det['event_topic']; ?>" ><?php  echo event_topic($ev_det['event_topic']); ?></option>

                </select>

				</div>									</td>



                  <td colspan="2"><div class="in_error" id="evt_topic_err"></div></td>

                </tr>



                



                



                <tr>



                  <td class="form_menu">Country<span class="errorText"> *</span></td>



                  <td>&nbsp;</td>



                  <td><select name="country" class="form_list" id="country">



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



				       </select></td>



                  <td colspan="2"><div class="in_error" id="country_err"></div></td>

                </tr>



                <tr>



                    <td class="form_menu">State or Province</td>



                    <td>&nbsp;</td>



                    <td><input name="state" type="text" class="form_text" id="state" maxlength="100"  value="<?php echo $ev_det['state']; ?>"/></td>



                    <td colspan="2"><div class="in_error" id="state_err"></div></td>

                </tr>



                



                <tr>



                    <td class="form_menu"><span id="topicHeading">City<span class="errorText"> *</span></span></td>



                    <td>&nbsp;</td>



                    <td><input name="city" type="text" class="form_text" id="city" maxlength="100" value="<?php echo $ev_det['city']; ?>" /></td>



                    <td colspan="2"><div class="in_error" id="city_err"></div></td>

                </tr>



                



                



                <tr>



                    <td class="form_menu"><span id="topicHeading">Organizing society</span></td>



                    <td>&nbsp;</td>



                    <td><input name="org_society" type="text" class="form_text" id="org_society" maxlength="255" value="<?php echo $ev_det['org_society']; ?>" /></td>



                    <td colspan="2"><div class="in_error" id="society_err"></div></td>

                </tr>



                



                <tr>



                    <td class="form_menu"><span id="topicHeading">Contact person for event<span class="errorText"> *</span></span></td>



                    <td>&nbsp;</td>



                    <td><input name="ev_contact_p" type="text" class="form_text" id="ev_contact_p" maxlength="100" value="<?php echo $ev_det['contact_person_event']; ?>"  /></td>



                    <td colspan="2"><div class="in_error" id="ev_cont_no_err"></div></td>

                </tr>



                



                <tr>



                    <td class="form_menu"><span id="topicHeading">Event enquiries email address<span class="errorText"> *</span></span></td>



                    <td>&nbsp;</td>



                    <td><input name="ev_enq_email" type="text" class="form_text" id="ev_enq_email" maxlength="150" value="<?php echo $ev_det['event_enq_email']; ?>" /></td>



                    <td colspan="2"><div class="in_error" id="ev_enq_mail_err"></div></td>

                </tr>



                



                <tr>



                    <td class="form_menu"><span id="topicHeading">Website address<span class="errorText"> *</span></span></td>



                    <td>&nbsp;</td>



                    <td><input name="ev_url" type="text" class="form_text" id="ev_url" value="<?php echo $ev_det['web_url']; ?>"  /></td>



                    <td colspan="2"><div class="in_error" id="ev_url_err"></div></td>

                </tr>



                



                <tr>



                    <td class="form_menu"><span id="topicHeading">Event start date<span class="errorText"> *</span></span></td>



                    <td>&nbsp;</td>



                    <td><input name="ev_start_date" type="text" class="form_text" id="ev_start_date"  value="<?php echo $ev_det['event_stat']; ?>"  />										



							<script type="text/javascript">



							$(function() {



							$('#ev_start_date').datepick({dateFormat: 'yyyy-mm-dd'});							



							});



							



							</script>					</td>



                    <td colspan="2"><div class="in_error" id="ev_st_err"></div></td>

                </tr>



                



                <tr>



                    <td class="form_menu"><span id="topicHeading">Last day of event<span class="errorText"> *</span></span></td>



                    <td>&nbsp;</td>



                    <td><input name="ev_end_date" type="text" class="form_text" id="ev_end_date"    value="<?php echo $ev_det['event_end']; ?>"/>



					



					<script type="text/javascript">



							$(function() {



							$('#ev_end_date').datepick({dateFormat: 'yyyy-mm-dd'});



							});



					</script>					</td>



                    <td colspan="2"><div class="in_error" id="ev_end_err"></div></td>

                </tr>



                



                <tr>



                    <td class="form_menu"><span id="topicHeading">Deadline for abstracts/proposals</span></td>



                    <td>&nbsp;</td>



                    <td><input name="dead_abst" type="text" class="form_text" id="dead_abst"   value="<?php echo $ev_det['abstract_deadline']; ?>" />



					



					<script type="text/javascript">



							$(function() {



							$('#dead_abst').datepick({dateFormat: 'yyyy-mm-dd'});



							});



					</script>					</td>



                    <td colspan="2"><div class="in_error" id="deadline_err"></div></td>

                </tr>



                



                <tr>



                  <td class="form_menu"><span id="topicHeading">Short Description of event<span class="errorText"> *</span></span></td>



                  <td>&nbsp;</td>



                  <td><textarea name="ev_desc" class="form_textarea"   id="ev_desc" onkeyup="countChar(this)"><?php echo $ev_det['short_desc']; ?></textarea>



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



                      <br />



                      <div id="charNum">300 Letter Left</div></td>



                  <td colspan="2"><div class="in_error" id="desc_err"></div></td>

                </tr>



                <tr>



                  <td class="form_menu">&nbsp;</td>



                  <td>&nbsp;</td>



                  <td>&nbsp;</td>



                  <td colspan="2">&nbsp;</td>

                </tr>





                <tr>



                  <td height="63" class="form_menu">&nbsp;</td>



                  <td>&nbsp;</td>



                  <td colspan="3" align="left" valign="top"></td>

                </tr>



          <!--      <tr>



                  <td height="63" class="verticalMiddle"><span id="topicHeading">Security code</span></td>



                  <td>&nbsp;</td>



                  <td align="left" valign="top"><input name="dead_abst2" type="text" class="organizerField" id="dead_abst2" readonly="readonly"  onclick="dt();" />



                    <br />



                    <br />



                  <img src="php_captcha.php"/></td>



                  <td colspan="2"></td>



                </tr>-->



                <tr>



                  <td height="37" class="verticalMiddle">&nbsp;</td>



                  <td>&nbsp;</td>



                  <td><label>



                    <input type="image" name="imageField2" src="images/submit.png" />



                  </label></td>



                  <td colspan="2">&nbsp;</td>

                </tr>



                <tr>



                  <td height="37" colspan="5" align="center" valign="middle" class="verticalMiddle"><label></label>                    <div id="load" align="left"> </div></td>

                </tr>

  </table>



            



      



			<input type="hidden" name="cap_val" value="<?php print $_SESSION['key']; ?>" />



</form>

		

		

		</td>

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

    <td height="100" colspan="3"  background="images/header-bg.jpg"><div class="copyright">Copyright &copy; 2013, All Rights Reserved, Powered By &nbsp; Conferencealerts</div></td>

  </tr>

</table>



</body>

</html>

