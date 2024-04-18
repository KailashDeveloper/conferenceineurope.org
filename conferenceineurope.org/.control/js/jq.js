$(function(){
$('#login').submit(function(e){							
e.preventDefault();
var form = $(this);
var post_url=form.attr('action');
var post_data=form.serialize();
$('#load').html("Loading Please Wait");


$.ajax({
type:'POST',
url:post_url,
data:post_data,
success:function(msg){$('#load').html(msg);}
});
});
});
