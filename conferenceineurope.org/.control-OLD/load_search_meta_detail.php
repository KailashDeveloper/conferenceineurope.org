<?php
session_start();
include"mysqli_dbconn.php";
include("fun.php");
$hidden="";
$meta_id="";

$Keyword=sql_inj($_REQUEST['Keyword']);

$Keyword=ltrim($Keyword," ");
$Keyword=rtrim($Keyword," ");

echo $Keyword = trim_url($Keyword);
?>

<?php
function  trim_url($url)
	{	
		
		$https =strpos( $url, 'https://' );
		$http =strpos( $url, 'http://' );
		
			
	if( $https !== false || $http !== false  )
		{	
				if(  $https !== false)
				{										
				$r=explode("https://",$url);					
				$return=$url=trim($r[1]);				
				}
			
			
			
		elseif( $http !== false)
					{	$r=explode("http://",$url);						
						$return=$url=trim($r[1]);						
					}
		}
		
	 else $return ="ERROR";
	 
	$www =strpos( $url, 'www.' );
	if($www !== false)
		{										
		$r=explode("www.",$url);					
	    $return=$url=trim($r[1]);				
		}
		
	
	$date_q =strpos( $url, '?date' );
	if($date_q !== false)
		{										
		$r=explode("?date",$url);					
	    $return=$url=trim($r[0]);				
		}
		
	
   return $return;	
	}

?>


<?php
if($Keyword!='ERROR')
	{
$query_pag_data = "SELECT * FROM `meta` where `url` = '$Keyword'";
$result_pag_data = mysqli_query($link,$query_pag_data) or die('MySql Error' . mysql_error());

$sql_new_ev=mysqli_fetch_array($result_pag_data);

$chk_exist=mysqli_num_rows($result_pag_data);

if($chk_exist>0)
	{
	$hidden="UPDATE";
	$meta_id=$chk_exist['meta_id'];
	}
else $hidden="NEW";



?>
<br />
<h3><?php echo $hidden; ?> </h3>
<hr />




<script language="javascript">
$(function(){		   
$('#add_url').submit(function(e){
e.preventDefault();
var form=$(this);
var post_data=form.serialize();
var post_url=form.attr('action');
$('#add_url_load').html("loading");
  $.ajax({
  type:"POST",
  url:post_url,
  data:post_data,
  success:function(msg){$('#add_url_load').html(msg);}
  }); 
  });
  });
////////
///////

function load_form(Keyword)
	{
	$('#load').html("<img src='images/loading.gif'/> Loading Please Wait").fadeIn('fast');
    $.get('load_search_meta_detail.php',{Keyword:Keyword},function(d){$('#load').html(d);});
	}
</script>



<form id="add_url" name="add_url" method="post" action="update_meta_url.php">
<input type="hidden" name="hidden" id="hidden"  value="<?php echo $hidden; ?>" />
<input type="hidden" name="meta_id" id="meta_id" value="<?php echo $meta_id; ?>"  />
   <table width="800" border="0" align="center" cellpadding="0" cellspacing="10">
    <tr>
      <td colspan="2" align="center"><h2>Update Meta Detail</h2></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="114"><strong>Url</strong></td>
      <td width="656"><label>
        <input type="text" name="url" id="url"  readonly="readonly" value="<?php echo $Keyword; ?>" class="form_text" style="width:600px;"/>
      </label></td>
    </tr>
    <tr>
      <td><strong>Meta Title</strong></td>
      <td><label>
        <textarea name="meta_title" id="meta_title"  class="form_textarea" style="width:600px;"><?php echo stripslashes(trim($sql_new_ev['meta_title'])); ?></textarea>
      </label></td>
    </tr>
    <tr>
      <td><strong>Meta Keywords</strong></td>
      <td><label>
        <textarea name="meta_keywords" id="meta_keywords"  class="form_textarea" style="width:600px;"><?php echo stripslashes(trim($sql_new_ev['meta_keywords'])); ?></textarea>
      </label></td>
    </tr>
    <tr>
      <td><strong>Meta Desc</strong></td>
      <td><label>
        <textarea name="meta_desc" id="meta_desc"  class="form_textarea" style="width:600px;" ><?php echo stripslashes(trim($sql_new_ev['meta_desc'])); ?></textarea>
      </label></td>
    </tr>
    <tr>
      <td><strong>Page Content</strong></td>
      <td><label>
        <textarea name="page_content" id="page_content"  class="form_textarea" style="width:600px;" ><?php echo stripslashes(trim($sql_new_ev['page_content'])); ?></textarea>
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="button" id="button" value="Submit" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
     </tr>
  </table>
</form>
<?php
	}
?>

<div id="add_url_load" ></div>
