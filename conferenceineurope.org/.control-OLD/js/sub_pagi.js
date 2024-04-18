
$(document).ready(function(){

							function loading_show()
							{
							$('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast');
							}
							function loading_hide()
							{
							$('#loading').fadeOut('fast');
							}  
							
							
							
                function loadData(page)
				{					
                  loading_show();                    
                    $.ajax
                    ({
                        type: "POST",
                        url: "load_subscribed_data.php",
                        data: "page="+page,
                        //success: function(msg){$("#container").ajaxComplete(function(event, request, settings){/*loading_hide();*/$("#container").html(msg);});}
						success: function(msg){loading_hide();$("#container").html(msg);}
                    });
                }
                loadData(1);  // For first time page load default results
                $('#container .pagination li.active').live('click',function(){
						
                    var page = $(this).attr('p');
                    loadData(page);
                    
                });           

            });
			

function details(id)
	{
		
			if($('#ln_'+id).text()=='View')
			{				
			$('#ln_'+id).html("Hide");
			$('#ln_'+id).addClass('view_text');
			$('#det_'+id).html("<img src='images/loading.gif' width='40' height='40' />");	
			$.get("inv_ev_detail.php",{ev_id:id},function(d){$("#det_"+id).html(d)})
			}
	
				else if($('#ln_'+id).text()=='Hide')
				{
				$('#ln_'+id).text('View');
				$('#ln_'+id).addClass('hidetext');
				$('#det_'+id).html("");
				}	
				
	}
	
	function manage(id)	
	{
	$.get('manage.php',{ev_id:id},function(d){$('#light').html(d);})
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';
	
	}