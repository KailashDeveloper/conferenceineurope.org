<?php include('header_menue.php'); ?>







<section class="home-banner">



<div class="container-fluid">



<!--<div class="bord-line-top"></div>-->



<span class="ban_head">Conferences in Europe</span>



<form name="advance_search" id="advance_search" method="get" action="<?php echo $base_url; ?>advancesearch.php"  class="home-search">



<!--<h2> <i class="fa fa-map-marker"></i> Search a place</h2>-->



<div class="row">



<div class="col-md-3 pl-0 pr-0">



<div  class="home-s-fld-sec">



<?php 



if($pp=="advancesearch.php")



{



$searchcountry=sql_inj(str_xss(sp_replace_hi_rev($_REQUEST['searchcountry'])));



$searchtopic=sql_inj(str_xss(sp_replace_hi_rev($_REQUEST['searchtopic'])));



$searchmonth=sql_inj(str_xss(sp_replace_hi_rev($_REQUEST['searchmonth'])));



$searchyear=sql_inj(str_xss(sp_replace_hi_rev($_REQUEST['searchyear'])));



}



else 



{



$searchcountry="";



$searchtopic="";



$searchmonth="";



$searchyear="";



}



?>                



<select data-placeholder="Choose a Country..." class="home-s-fld"  name="searchcountry" id="searchcountry">



<option value="">Select A Country</option>



<?php



$sql_con=mysqli_query($link,"SELECT * FROM `country`  where `region`= 'Europe' ORDER BY `country` ASC");



while($con_data=mysqli_fetch_array($sql_con))



{



$s_con_id=$con_data['id'];



$s_con_name=$con_data['country'];







if($s_con_id==$searchcountry)



{



$selected="selected";



}



else $selected="";







?>



<option  value="<?php echo $s_con_id; ?>" <?php echo $selected; ?>><?php echo $s_con_name; ?></option>



<?php



}



?>



</select>



</div>



</div>



<div class="col-md-3 pl-0 pr-0">



<div  class="home-s-fld-sec">



<select data-placeholder="Choose a Category..." class="home-s-fld"  name="searchtopic" id="searchtopic">



<option value="">Select A Topic</option>	



				<?php



                $sql_con=mysqli_query($link,"SELECT * FROM `event_topic` ORDER BY `topic` ASC");



                while($con_data=mysqli_fetch_array($sql_con))



                {



					$s_top_id=$con_data['topic_id'];



					$s_top_name=$con_data['topic'];



					



					



						if($s_top_id==$searchtopic)



						{



							$selected="selected";



						}



						else $selected="";



                ?>



<option  value="<?php echo $s_top_id; ?>" <?php echo $selected; ?> ><?php echo $s_top_name; ?></option>



<?php



}



?>



</select>  



</div>



</div>



<div class="col-md-2 pl-0 pr-0">



<div  class="home-s-fld-sec">



<select name="searchyear" id="searchyear"  class="home-s-fld">



<option value="">Select A Year</option>



<option value="2024" <?php if($searchyear==2024) { echo "selected"; } ?>>2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
<option value="2027">2027</option>
</select>



</div>



</div>



<div class="col-md-2 pl-0 pr-0">



<div  class="home-s-fld-sec">



<select name="searchmonth" id="searchmonth"  class="home-s-fld">



<option value="">Select A Month</option>



						<?php          



                        for($i=1;$i<13;$i++)



                        { 



                        $monthNum = $i;



                        $monthName = date("F", mktime(0, 0, 0, $monthNum,10));



						



						



							if($monthNum==$searchmonth)



							{



							$selected="selected";



							}



							else $selected="";



						



                        ?>



<option value="<?php echo $monthNum; ?>" <?php echo $selected; ?>><?php echo $monthName; ?></option>



<?php	



}



?>



</select>



</div>



</div>



<div class="col-md-2 pl-0 pr-0">



<button name="" type="" class="search-submit" onClick="window.location.href = 'search.html'"><i class="fa fa-search"></i>  Search</button>



</div>



</div> 



</form>



<!--<div class="bord-line-bottom"></div>-->



</div>



</section>











<section class="home-banner-">



<div class="container">



<?php include("banner.php"); ?>















	</div>



</section>