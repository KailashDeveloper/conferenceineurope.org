<?php

if(!isset($link))

include("mysqli_dbconn.php");

include("fun.php");

$event_id=$_REQUEST['ev_id'];

$sql_ev_inv=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `event` WHERE `event_id`='$event_id'"));

$org_inv_id=$sql_ev_inv['org_id'];

$sql_ev_org_det=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_id`='$org_inv_id'"));

?>

<link rel="stylesheet" type="text/css" href="css/form.css" />



<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF" class="tab">

  <tr>

    <td colspan="4" align="center">&nbsp;</td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td colspan="3" rowspan="2">

	

	<fieldset class="fld_set">

<legend class="leg_hed">&nbsp;&nbsp;Organizer Detail&nbsp;&nbsp;&nbsp;&nbsp;</legend>

	<table width="100%" border="0" cellspacing="2" cellpadding="0">

      <tr>

        <td width="23%" class="table_sub_content">Organizer Detail </td>

        <td width="1%">&nbsp;</td>

        <td width="76%">&nbsp;</td>

      </tr>

      <tr>

        <td class="table_sub_content"><span id="topicHeading">Organizer Name</span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_org_det['contact_person_name']; ?></td>

      </tr>

      <tr>

        <td class="table_sub_content"><span id="topicHeading">Name of Organization </span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_org_det['orginisation_name']; ?></td>

      </tr>

      <tr>

        <td class="table_sub_content"><span id="topicHeading">Organizer Email </span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_org_det['org_mail']; ?></td>

      </tr>

      <tr>

        <td>&nbsp;</td>

        <td>&nbsp;</td>

        <td>&nbsp;</td>

      </tr>

    </table>

	</fieldset>	</td>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td colspan="3">&nbsp;</td>

  </tr>

  <tr>

    <td width="13%">&nbsp;</td>

    <td colspan="3">

	<fieldset class="fld_set">

<legend class="leg_hed">&nbsp;&nbsp;Event Datail &nbsp;&nbsp;&nbsp;</legend>

	<table width="100%" border="0" cellspacing="2" cellpadding="0">

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content">Event Id </td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['event_id']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td width="23%" class="table_sub_content"><span id="topicHeading">Event name </span></td>

        <td width="1%">&nbsp;</td>

        <td width="76%" class="table_content"><?php echo  $sql_ev_inv['event_name']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content"><span id="topicHeading">Event type </span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  event_type($sql_ev_inv['event_type']); ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content">Event Category </td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  event_cat($sql_ev_inv['event_topic']); ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content">Event Topic</td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  event_topic($sql_ev_inv['event_topic']); ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content">Country </td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  event_country($sql_ev_inv['country']); ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content">State or Province</td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['state']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content"><span id="topicHeading">City </span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['city']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content"><span id="topicHeading">Organizing society</span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['org_society']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content"><span id="topicHeading">Contact person for event </span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['contact_person_event']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content"><span id="topicHeading">Event enquiries email address </span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['event_enq_email']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content"><span id="topicHeading">Website address </span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['web_url']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content"><span id="topicHeading">Event start date </span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['event_stat']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content"><span id="topicHeading">Last day of event </span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['event_end']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content"><span id="topicHeading">Deadline for abstracts/proposals</span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['abstract_deadline']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content"><span id="topicHeading">Short description of event </span></td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['short_desc']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content">Event keywords</td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['keywords']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content">Post Date </td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['date_post']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content">Status</td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['status']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content">Message</td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['message']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content">Reason For Reject </td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['reason']; ?></td>

      </tr>

      <tr bgcolor="#FFFFFF" class="tab">

        <td class="table_sub_content">Repeated Submit </td>

        <td>&nbsp;</td>

        <td class="table_content"><?php echo  $sql_ev_inv['reg_counter']; ?></td>

      </tr>

    </table>

	</fieldset>	</td>

  </tr>

  

  <tr>

    <td>&nbsp;</td>

    <td width="20%">&nbsp;</td>

    <td width="1%">&nbsp;</td>

    <td width="66%">&nbsp;</td>

  </tr>

</table>

