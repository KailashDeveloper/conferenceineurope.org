<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>







			<div class="containers col-md-12" >

			<?php

				

                if($pp=="index---.php")

                { 

					$k=0;					

				 $sql_new_ev="SELECT * FROM `ad_image` WHERE `ad_type`='Top' and (`country` ='0' || `country` ='' ||`country` IS NULL ) and `expire_date` >= now()    ORDER BY `id`  DESC limit 0,8";

					$link_new_ev=mysqli_query($link,$sql_new_ev);

					while($new_ev_data=mysqli_fetch_array($link_new_ev))

					{

					if($k==4)echo "<br>";

					$k=$k+1;	

										

			  

                ?>

            

				<div class="col-md-3 banner_grid">

				  <a href="<?php echo $new_ev_data['url']; ?>" target="_blank">

                   <img src="<?php echo $base_url; ?>ad/<?php echo  $new_ev_data['image']; ?>" alt="featured conference" height='150' class="img-responsive" alt='<?php echo  $new_ev_data['alt']; ?>' alt='<?php echo  $new_ev_data['alt
				   ']; ?>'></a>

				</div>

                

                 <?php

				 }

				 ?>

                

             <?php

				}

				?>

                

                

             

           <?php

               if(isset($country))

                { 

		

					$k=0;					

					$sql_new_ev="SELECT * FROM `ad_image` WHERE `ad_type`='Top' and ( `country` = '$country' and `expire_date`>=now() )  ORDER BY `id`  DESC limit 0,8";

					$link_new_ev=mysqli_query($link,$sql_new_ev);

					while($new_ev_data=mysqli_fetch_array($link_new_ev))

					{

					

					if($k==4)echo "<br>";

					$k=$k+1;					

			  

                ?>

            

				<div class="col-md-3 banner_country" style="margin-bottom:5px;">

				  <a href="<?php echo $new_ev_data['url']; ?>" target="_blank">

                   <img src="<?php echo $base_url; ?>ad/<?php echo  $new_ev_data['image']; ?>" alt="featured conference" class="img-responsive" style="height: 130px;" alt='<?php echo  $new_ev_data['alt']; ?>'></a>

				</div>

                

                 <?php

				 }

				 ?>

                

             <?php

				}

				?>

                

                

                

                

                

				<div class="clearfix"> </div>

				</div>