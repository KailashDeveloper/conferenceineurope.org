$(function(){
$('#search').submit(function(e){							
e.preventDefault();
var form = $(this);
var post_url=form.attr('action');
var post_data=form.serialize();
$('#load').html("<img src='images/loading.gif'/> Loading Please Wait").fadeIn('fast');



$.ajax({
type:'POST',
url:post_url,
data:post_data,
success:function(d){$('#load').html(d);}
});
});
});
