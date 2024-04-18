$(function(){		   
$('#add_event').submit(function(e){							
e.preventDefault();
var form=$(this);
var post_data=form.serialize();
var post_url=form.attr('action');
$('#load').html("loading"); 
 if(validate())
 {
  $.ajax({
  type:"POST",
  url:post_url,
  data:post_data,
  success:function(msg){$('#load').html(msg);}
  });
  }  
 else  
  $('#load').html("Please Fill All The form Detail");  
  });
  });
////////
///////


$(function(){		   
$('#edit_event').submit(function(e){	
								
e.preventDefault();
var form=$(this);
var post_data=form.serialize();
var post_url=form.attr('action');
$('#load').html("loading");
 
 if(validate())
 {
  $.ajax({
  type:"POST",
  url:post_url,
  data:post_data,
  success:function(msg){$('#load').html(msg);}
  });
  }  
 else  
  $('#load').html("Please Fill All The form Detail");  
  });
  });


//////////
//////////
//////////

function validate()
	{
	
 $('#contact_err').html("");
 $('#org_err').html("");
 $('#org_em_er').html("");
 $('#p_err').html("");
 $('#con_p_err').html("");
 $('#ev_nm_err').html("");
 $('#evt_cat_err').html("");
 $('#evt_topic_err').html("");
 $('#country_err').html("");
 $('#state_err').html("");
 $('#city_err').html("");
 $('#society_err').html("");
 $('#ev_cont_no_err').html("");
 $('#ev_enq_mail_err').html("");
 $('#ev_url_err').html("");
 $('#ev_st_err').html("");
 $('#ev_end_err').html("");
 $('#deadline_err').html("");
 $('#desc_err').html("");
	



	
	var event_name=document.add_event.event_name.value;
	if(event_name.replace(/(^[\s]+|[\s]+$)/g, '')=="")	 
	{
		alert("Event name Can not be blank");
		$('#ev_nm_err').html("Invalid Event Name");
        document.add_event.event_name.focus();
		return false;
	}
	
	//////
	////// Event Category 
			var evt_cat=document.add_event.evt_cat.value;
			if(evt_cat==0)
			{
			alert("Please Choose One Event Category");	
			 $('#evt_cat_err').html("Please Choose One Event Category");
			document.add_event.evt_cat.focus();	
			return false;
			}
  //////Topic
		var evt_topic=document.add_event.evt_topic.value;
			if(evt_topic==0)
			{
			alert("Please Choose One Event Topic");	
			 $('#evt_topic_err').html("Please Choose One Event Topic");
			document.add_event.evt_topic.focus();	
			return false;
			}
////////////
//////////// Country

		var country=document.add_event.country.value;
			if(country==0)
			{
			alert("Please Choose One Country");
			$('#country_err').html("Please Choose One Country");
			document.add_event.country.focus();	
			return false;
			}



////////////
///////////State Valdation

	/*	var state=document.add_event.state.value;		
		if(state.replace(/(^[\s]+|[\s]+$)/g, '')=="")
				{				 
					alert("Invalid state Name Please Re Enter");
					$('#state_err').html("Invalid state Name Please Re Enter");
					document.add_event.state.focus();
					error=1;
					return false;	
				 }*/
////////////////
//////////////// City
 var city=document.add_event.city.value;		
 if(city.replace(/(^[\s]+|[\s]+$)/g, '')=="")

				{				 
					alert("Invalid city Name Please Re Enter");
					$('#city_err').html("Invalid city Name Please Re Enter");
					document.add_event.city.focus();
					error=1;
					return false;	
				 }
//////////
///////////Organizing society

 var org_society=document.add_event.org_society.value;
 
  if(org_society.replace(/(^[\s]+|[\s]+$)/g, '')=="")

				{				 
					alert("Invalid Organization society Please Re Enter");
					$('#society_err').html("Invalid Organization society Please Re Enter");
					document.add_event.org_society.focus();
					error=1;
					return false;
				 }
 
		
//////////
///////// Contact Name For Event

	var ev_contact_p=document.add_event.ev_contact_p.value;		
		var stringSplitArray = ev_contact_p.split(" ");
		var j = 0;
		
			if(ev_contact_p.replace(/(^[\s]+|[\s]+$)/g, '')=="") // name validation
				{				 
					alert("Invalid Contact Person Please Re Enter");
					$('#ev_cont_no_err').html("Please Enter A Valid Organization Name");
			
					document.add_event.ev_contact_p.focus();
					error=1;
					return false;	
				 }
			
		
/////////
//////// Event Mail
var ev_enq_email=document.add_event.ev_enq_email.value;	
if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(ev_enq_email))  // validation for email
					{
					alert("Invalid Enquiry E-mail Address! Please re-enter.");
					$('#ev_enq_mail_err').html("Please Enter A Valid Email Id");
					document.add_event.ev_enq_email.focus();
					error=1;
					return false;	
					}
////////////
////////////


///////////
////////// Event start date

var ev_start_date=document.add_event.ev_start_date.value;	
 if(ev_start_date=="")
 	{
		alert("Event Start Date Can Not Be Blank");
		 $('#ev_st_err').html("Event Start Date Can Not Be Blank");
		document.add_event.ev_start_date.focus();
		return false;	
	}
 
 
 ///////////
////////// Event End date

var ev_end_date=document.add_event.ev_end_date.value;	
 if(ev_end_date=="")
 	{
		alert("Event End Date Can Not Be Blank");
		$('#ev_end_err').html("Event End Date Can Not Be Blank");
		document.add_event.ev_end_date.focus();
		return false;	
	}
	else if(ev_end_date<ev_start_date)
	{
		alert("Event End date cannot be earlier than start date");
		$('#ev_end_err').html("Event End Date Can Not Be Blank");
		document.add_event.ev_end_date.focus();
		return false;
		
	}

 ///////////
////////// Abstract DeadLine

var dead_abst=document.add_event.dead_abst.value;	
if(dead_abst=="")
 	{
		alert("Deadline for abstracts/proposals Can Not Be Blank");
		 $('#deadline_err').html("Deadline for abstracts/proposals Can Not Be Blank");
		document.add_event.dead_abst.focus();
		return false;	
	}
else if(dead_abst>ev_start_date)
 	{
		alert("Deadline for abstracts/proposals Can Not Be Greater than start date");
		 $('#deadline_err').html("Deadline for abstracts/proposals Can Not Be Blank");
		document.add_event.dead_abst.focus();
		return false;	
	}


////////// Event Description

var ev_desc=document.add_event.ev_desc.value;	
 if(ev_desc=="")
 	{
		alert("Event Description Can Not Be Blank");
		$('#desc_err').html("Event Description Can Not Be Blank");
		document.add_event.ev_desc.focus();
		return false;	
	}


return true;
		
	}	
	
	
function topic_js(evt_cat)
	{
		if(evt_cat!=0)
				{
				$.get('get_topic.php',{cat_id:evt_cat},function(d){$('#topic_det').html(d);});
				}
				else 
				{
				$('#city_det').html("<select name='evt_topic' id='evt_topic' disabled='disabled'><option value='0'>Select One Topic</option></select>");
				}
	}
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	///////////////LOGIN//////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	
	
$(function(){		   
$('#login_form').submit(function(e){									
e.preventDefault();
var form=$(this);
var post_data=form.serialize();
var post_url=form.attr('action');
$('#log_err').html("Validate Login");
  $.ajax({
  type:"POST",
  url:post_url,
  data:post_data,
  success:function(msg){$('#og_panel').html(msg);}
  });
  });
  });

	
	