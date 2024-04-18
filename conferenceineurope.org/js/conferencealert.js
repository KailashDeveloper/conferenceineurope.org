$(function(){$('#loginForm').submit(function(e){e.preventDefault();var form=$(this);var post_data=form.serialize();var post_url=form.attr('action');if(validate_login())
{$('#log_load').html("<img src='images/loading.gif' width='32' height='32' />");$.ajax({type:"POST",url:post_url,data:post_data,success:function(msg){$('#log_load').html(msg);}});}
else
{alert('Enter Valid Userd Login');$('#head_load').html("Enter Valid Userd Login");}});});function validate_login()
{return true;}
function error_login()
{$('#log_load').html('Invald Id OR Password');}
function success_login(page)
{window.location=page;}
$(function(){$('#forgot').submit(function(e){e.preventDefault();var form=$(this);var post_data=form.serialize();var post_url=form.attr('action');$('#forgot_load').html("loading");if(forgot_validate())
{$.ajax({type:"POST",url:post_url,data:post_data,success:function(msg){$('#forgot_load').html(msg);}});}
else
$('#forgot_load').html("Please Fill All The form Detail");});});function forgot_validate()
{var email=document.forgot.org_mail.value;if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))
{alert("Invalid  E-mail Address! Please re-enter.");document.forgot.org_mail.focus();error=1;return false;}
return true;}