
<link rel="stylesheet" type="text/css" href="css/vmenu.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
$(document).ready(function () {
  $('#nav > li > a').click(function(e){
     if ($(this).attr('class') != 'active'){
       $('#nav li ul').slideUp();
	   $(this).next().slideToggle();
	   $('#nav li a').removeClass('active');
	   $(this).addClass('active');
	 }
	 e.preventDefault();
  });
});
</script>
 
		  <ul id="nav">
	
		<li><a class="active" href="javascript:void(0);">Event Details</a>
		  <ul style="display: block;">
		    <li><a href="new_event.php">New Event </a></li>
			<li><a href="pending_event.php">Pending Event</a></li>
			<li><a href="temp_reg_event.php">Temp Rejected Event</a></li>
			<li><a href="permanent_reg_event.php">Permanent Rejected Event</a></li>
			<li><a href="accepted_reg_event.php">Accepted Event</a></li>
            <li><a href="search_event.php">Search Event</a></li>
			<li><a href="#"> ------------------- </a>   </li>
				<li><a href="non_validated_events.php">Non Validated Events</a></li>				
				<li><a href="promoted_events.php">Promoted Events</a></li>
                
           <li><a href="import_ALERTSIN.php">Import IN</a></li>     
                

			
		  </ul>
		</li>
		
		<li><a href="#">Mail</a>
		  <ul>
		    <li><a href="ed_mail.php">Edit Mail Detail</a></li>
			 <li><a href="#">Sub-Item 4 a</a></li>
			
		  </ul>
		</li>
		
		 <li><a href="#" class="active">Promotion</a>
		  <ul style="display:block;">
          
        
            <li><a href="create_group_add.php">Create Group Promote</a></li>
            <li><a href="view_group_add.php">View All Group Promote</a></li>
           <li><a href="view_Hidden_group_add.php">View Hidden Group Promote</a></li> 
                      
		    <li><a href="add_ad_image.php">Add Ad Images</a></li>
		    <li><a href="all_top_add.php">Edit Top Add Images</a></li>
			<li><a href="all_left_add.php">Edit Left Add Images</a></li>
            <li><a href="all_fr_right_add.php">Edit Front Right Add</a></li>
            <li><a href="all_org_promote.php">Org Add Promotion</a></li>
			<li> <a href="all_transaction.php">All Transaction</a> </li>
			
		  </ul>
		</li>
		
		
		<li><a href="#">Subscribe</a>
		  <ul>
		    <li><a href="all_subscribed.php">View All Subscriber</a></li>
			 <li><a href="#">Sub-Item 4 a</a></li>
			
		  </ul>
		</li>
		
	<li><a href="#">Organiser</a>
		  <ul>
		    <li><a href="all_organiser.php">View All Organiser</a></li>
			 <li><a href="#">Sub-Item 4 a</a></li>
			
		  </ul>
   </li>
   
   
   <li><a href="#">Meta Update</a>
		  <ul>
		    <li><a href="veiew_meta_details.php">View Meta Detail</a></li>
			 
			
		  </ul>
   </li>		
		
		<li><a href="#">Setting</a>
		  <ul>
		    <li><a href="edit_pass.php">Change Password</a></li>
			<li><a href="dup_event.php">Duplicate Events</a></li>
			<li><a href="hide_event.php">Hide Events</a></li>
            
            
            <li><a href="delete_DISABLE.php">Delete Disabled Events</a></li>
            
            
            <li><a href="popular_citys.php">Popular Cities</a></li>
		  </ul>
		</li>
	  </ul>

	
<!--<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<script language="javascript" src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/chat.js"></script>-->
