<!--<script  language="javascript" src="js/jquery.min.js" ></script>-->
<script language="javascript" type="text/javascript">
$(function(){
$('#subscribe').submit(function(e){	
e.preventDefault();
var form = $(this);
var post_url=form.attr('action');
var post_data=form.serialize();
$('#load_subsc').html("Loading Please Wait").fadeIn('fast');

 if(subsc_val())
 {
	$.ajax({
	type:'POST',
	url:post_url,
	data:post_data,
	success:function(d){$('#load_subsc').html(d);}
});
}
});
});

function subsc_val()
	{
	var sub_email=document.subscribe.sub_email.value;
    if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(sub_email))  // validation for email
					{
					alert("Invalid E-mail Address! Please re-enter.");
					document.subscribe.sub_email.focus();
					error=1;
					return false;	
					}
					return true;
	}

</script>
 
<form action="subc_process.php" method="get" name="subscribe" id="subscribe">   
<section class="newsletr-sec">
<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 text-center">
<div class="newsletr-txt">
<span style="font-size: 25px; font-weight: bold"> Newsletter</span>
<p>Sign up to our newsletter to get the latest offers and articles direct to your inbox.</p>
<input class="news-fld" placeholder="Emai Id" name="sub_email" type="text" id="sub_email">
<button name="submit" type="submit" class="news-btm">Subscribe</button>
<div id="load_subsc" style="color:#FFFFFF; width:100%; float:left; margin-top:10px;"></div>
</div>
</div>
<div class="col-md-2"></div>
</div>
</div>
</section>
</form>