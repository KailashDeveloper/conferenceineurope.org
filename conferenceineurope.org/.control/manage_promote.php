<?php

include("mysqli_dbconn.php");

 $ev_id=$_REQUEST['ev_id'];

$date=date("Y-m-d");

if(isset($_REQUEST['status']) )

{

	

/*echo "<script>document.getElementById('light').style.visibility='hidden';</script>";

echo "<script>document.getElementById('fade').style.visibility='hidden';</script>";*/

						

}

$sql_ev_inv1=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `event` WHERE `event_id`='$ev_id'"));

$org_inv_id1=$sql_ev_inv1['org_id'];

$sql_ev_org_det1=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_id`='$org_inv_id1'"));



?>





<script language="javascript">

$(function(){



$('#staus').submit(function(e){

							

e.preventDefault();

var form = $(this);

var post_url=form.attr('action');

var post_data=form.serialize();

$('#test_status').html("Loading Please Wait");

$.ajax({

type:'POST',

url:post_url,

data:post_data,

success:function(msg){$('#test_status').html(msg);}

});

});

});



</script>

<style type="text/css">

<!--

.style1 {

	color: #0033FF;

	font-size: 12px;

}

-->

</style>





<form name="staus" id="staus" method="post" action="row_promote.php" onSubmit="">

<input type="hidden" name="ev_id" value="<?php echo $ev_id; ?>" />

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">

    <tbody>

      <tr>

        <td height="20" colspan="3" align="center"  class="inner_welcome">Manage  Promotion </td>

        <td width="4%" align="center"><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'" class="link"><img src="images/1369901297_dialog-close.png"  border="none" height="22" width="22" alt="close" /></a></td>

      </tr>

      <tr>

        <td height="32" colspan="4" align="center"><strong class="form_heading">Status</strong>&nbsp;&nbsp;&nbsp;<span class="domain"><?php echo $status= $sql_ev_inv1['status']; ?></span></td>

      </tr>

      <tr>

        <td align="right" class="table_sub_content">Organizer Name </td>

        <td align="left">&nbsp;</td>

        <td colspan="2" align="left" class="table_content"><?php echo $sql_ev_org_det1['contact_person_name']; ?></td>

      </tr>

      <tr>

        <td align="right" class="table_sub_content">Organization Name </td>

        <td align="left">&nbsp;</td>

        <td colspan="2" align="left" class="table_content"><?php echo $sql_ev_org_det1['orginisation_name']; ?></td>

      </tr>

      <tr>

        <td align="right" class="table_sub_content">&nbsp;</td>

        <td align="left">&nbsp;</td>

        <td colspan="2" align="left" class="table_content">		</td>

      </tr>

      <tr>

        <td align="right" class="table_sub_content">Event Id </td>

        <td align="left">&nbsp;</td>

        <td colspan="2" align="left" class="table_content"><?php echo $sql_ev_inv1['event_id']; ?></td>

      </tr>

      <tr>

        <td width="28%" align="right" class="table_sub_content">Event Name </td>

        <td align="left" width="1%">&nbsp;</td>

        <td colspan="2" align="left" class="table_content"><?php echo $sql_ev_inv1['event_name']; ?></td>

      </tr>

      <tr>

        <td class="table_sub_content" align="right">Promote Type </td>

        <td class="quickcontact_lebel" align="left">&nbsp;</td>

        <td colspan="2" align="left"><label>

          <select name="promote_type" class="form_list" id="promote_type">

            <option value="LINEEVENT">LINEEVENT</option>

            <option value="LEFTBANNER">LEFTBANNER</option>
            <option value="ORGEVENTCOUNTRY">ORGEVENTCOUNTRY</option>
            <option value="HOMEFEATURED">HOMEFEATURED</option>
              <option value="FEATURED">FEATURED</option>

          </select>

        </label></td>

      </tr>

      
<tr>
        <td class="quickcontact_lebel" align="right">Upload Logo</td>
        <td class="quickcontact_lebel" align="left">&nbsp;</td>
        <td width="19%" align="left">
        
	        <input name="images" type="file" class="form_text" id="images" />
		
        <script language="JavaScript" type="text/javascript">
					  (function () {
	var input = document.getElementById("images"), 
		formdata = false;
		
		
	if (window.FormData) {
  		formdata = new FormData();
  		
	}
	
	input.addEventListener("change", function (evt)
		  { 	
		  $('#response').html('<img src="loader.gif" />  Uploading Please Wait...');		
			file = this.files[0];	
			formdata.append("images", file);
		
		
	if (formdata) {
			$.ajax({
				url: "banner_upload.php",
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
					  </script></td>
        <td width="48%" align="left"><div class="in_error" id="response"></div></td>
        <td align="left">&nbsp;</td>
      </tr>
      
      
      <tr>

        <td class="table_sub_content" align="right">Page Wise</td>

        <td class="quickcontact_lebel" align="left">&nbsp;</td>

        <td colspan="2" align="left"><label>

          <select name="promote_place" class="form_list" id="promote_place">

            <option value="ALLPAGES">ALLPAGES</option>

            <option value="COUNTRYPAGE">COUNTRYPAGE</option>

                    </select>

          <br />

          <br />

          <span class="style1">(<strong>COUNTRYPAGE</strong> WORK FOR ONLY <strong>LEFT BANNER</strong> PROMOTION)       </span></label></td>

      </tr>

      <tr>

        <td class="quickcontact_lebel" align="right"><input type="hidden" name="event_id" value="<?php echo $sql_ev_inv1['event_id']; ?>" />

        <input type="hidden" name="event_stat" value="<?php echo $sql_ev_inv1['event_stat']; ?>" /></td>

        <td class="quickcontact_lebel" align="left">&nbsp;</td>

        <td colspan="2" align="left"><label>

          <input name="Submit" type="submit" class="form_submit" value="Submit" />

        </label></td>

      </tr>

      

      <tr>

        <td height="20" colspan="4" align="center"><div id="test_status"></div></td>

      </tr>

    </tbody>

  </table>

</form>

