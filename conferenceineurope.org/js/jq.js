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


function validate()
	{
	
 		
		var contact_name=document.add_event.contact_name.value;		// Organizer Name Validation
	
  		//alert(stringSplitArray[j]);
				if(contact_name.replace(/(^[\s]+|[\s]+$)/g, '')=="") // name validation
				{				 
					alert("Invalid Conatct Name Please Re Enter");
					document.add_event.contact_name.focus();
					error=1;
					return false;	
				 }
		
				
	////////
	////////Name of Organization  Validation
	
		var orgn_name=document.add_event.orgn_name.value;
		
		  if(orgn_name.replace(/(^[\s]+|[\s]+$)/g, '')=="")

				{				 
					alert("Invalid Organization Name Please Re Enter");
					document.add_event.orgn_name.focus();
					error=1;
					return false;	
				 }
 
		

	
	///////////////////
	////////////////// Email
	
	
		    var email=document.add_event.org_mail.value; 
					if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))  // validation for email
					{
					alert("Invalid Organizer E-mail Address! Please re-enter.");
   				document.add_event.org_mail.focus();
					error=1;
					return false;	
					}
		
		
		///// password
		
		 var pass = document.getElementById("pass").value
         var confPass = document.getElementById("con_pass").value
		 
		 
		 if(!/^[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(pass))  // validation for email
					{
					alert("invalid Password");
					document.add_event.pass.focus();
					error=1;
					return false;	
					}
		 
		 
		 

		 
		 
		   if(pass != confPass) {
	            alert('Wrong confirm password !');
				$('#con_p_err').html("Password & Confirm Password Do not  Matched");
				document.add_event.con_pass.focus();
				return false;
	        }

	
	var event_name=document.add_event.event_name.value;
	if(event_name.replace(/(^[\s]+|[\s]+$)/g, '')=="")	 
	{
		alert("Event name Can not be blank");
        document.add_event.event_name.focus();
		return false;
	}
	
	//////
	////// Event Category 
			var evt_cat=document.add_event.evt_cat.value;
			if(evt_cat==0)
			{
			alert("Please Choose One Event Category");	
			document.add_event.evt_cat.focus();	
			return false;
			}
  //////Topic
		var evt_topic=document.add_event.evt_topic.value;
			if(evt_topic==0)
			{
			alert("Please Choose One Event Topic");	
			document.add_event.evt_topic.focus();	
			return false;
			}
////////////
//////////// Country

		var country=document.add_event.country.value;
			if(country==0)
			{
			alert("Please Choose One Country");
			document.add_event.country.focus();	
			return false;
			}



	
////////////////
//////////////// City
 var city=document.add_event.city.value;		

				if(city.replace(/(^[\s]+|[\s]+$)/g, '')=="")
				{				 
					alert("Invalid city Name Please Re Enter");
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
					document.add_event.org_society.focus();
					error=1;
					return false;
				 }
 

//////////
///////// Contact Name For Event

	var ev_contact_p=document.add_event.ev_contact_p.value;		
	
				if(ev_contact_p.replace(/(^[\s]+|[\s]+$)/g, '')=="") // name validation
				{				 
					alert("Invalid Contact Person Please Re Enter");

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
					document.add_event.ev_enq_email.focus();
					error=1;
					return false;	
					}
////////////
////////////


///////////
////////// Event start date

var ev_start_date_f=document.add_event.ev_start_date_f.value;	
 if(ev_start_date_f=="")
 	{
		alert("Event Start Date Can Not Be Blank");
		document.add_event.ev_start_date_f.focus();
		return false;	
	}
 
 
 ///////////
////////// Event End date

var ev_end_date_f=document.add_event.ev_end_date_f.value;	
 if(ev_end_date_f=="")
 	{
		alert("Event End Date Can Not Be Blank");
		document.add_event.ev_end_date_f.focus();
		return false;	
	}
	else if(ev_end_date_f<ev_start_date_f)
	{
		alert("Event End date cannot be earlier than start date");
		document.add_event.ev_end_date_f.focus();
		return false;
		
	}

 ///////////
////////// Abstract DeadLine


var dead_abst=document.add_event.dead_abst.value;	
if(dead_abst=="")
 	{
		alert("Deadline for abstracts/proposals Can Not Be Blank");
		document.add_event.dead_abst.focus();
		return false;	
	}
else if(dead_abst>ev_start_date_f)
 	{
		alert("Deadline for abstracts/proposals Can Not Be Greater than start date");
		document.add_event.dead_abst.focus();
		return false;	
	}


////////// Event Description

var ev_desc=document.add_event.ev_desc.value;	
 if(ev_desc=="")
 	{
		alert("Event Description Can Not Be Blank");
		document.add_event.ev_desc.focus();
		return false;	
	}


	var chk_val_data=document.add_event.chk_val_data.value;		

				if(chk_val_data.replace(/(^[\s]+|[\s]+$)/g, '')=="")
				{				 
					alert("Please Select one of keyword");
					
					error=1;
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
	
	
