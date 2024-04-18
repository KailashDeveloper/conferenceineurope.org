
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
                        url: "load_transaction.php",
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
			

function new_details(ev_id,tr_id)
	{
	/*	alert(ev_id);*/
				
			if($('#ln_'+tr_id).text()=='View')
			{				
			$('#ln_'+tr_id).html("Hide");
			$('#ln_'+tr_id).addClass('view_text');
			$('#det_'+tr_id).html("<img src='images/loading.gif' width='40' height='40' />");	
			$.get("inv_ev_detail.php",{ev_id:ev_id},function(d){$("#det_"+tr_id).html(d)});
			}
	
				else if($('#ln_'+tr_id).text()=='Hide')
				{
				$('#ln_'+tr_id).text('View');
				$('#ln_'+tr_id).addClass('hidetext');
				$('#det_'+tr_id).html("");
				}	
				
	}
	
	function manage(id)	
	{
	$.get('manage.php',{ev_id:id},function(d){$('#light').html(d);});
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';	
	}
	
	function promote(id)
		{
		$.get('row_promote.php',{prom_id:id},function(d){$('#promote_load').html(d);})	;
		}
		
	 function remove_promote(id)
		{
		$.get('row_promote_remove.php',{prom_id:id},function(d){$('#promote_load').html(d);})	;
		}	