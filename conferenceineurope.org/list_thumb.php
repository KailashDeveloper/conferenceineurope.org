<?php
if(!isset($base_url))
include('config.php');
?>

<!--start of month list -->

<?php
if(date('M Y', strtotime($event_stat)) != $cur_m)
{

$cur_m=date('M Y', strtotime($event_stat));

?>




<!--<h1 style="color:#E53302" style="display:none" >
<?php   //echo  date('F', strtotime($event_stat)); ?> &nbsp;<?php   //echo  date('Y', strtotime($event_stat)); ?>

</h1>-->












<?php

}

$h_class="";

if(check_row_prom($accept_data['event_id']))	

{

$h_class="topic-confr promt-link";

}

?>

<div class="inr-up-cmng-evnt-box mbt40 <?php echo $h_class; ?>">
<!--                                    <div class="inr-evndid"> Event ID: CE<?php   echo  $event_id; ?></div>-->

                                    <a href="<?php echo $base_url; ?>conf-detail.php?ev_id=<?php   echo $event_id; ?>&name=<?php   echo str_replace(" ","-",$event_name); ?>" class="inr-up-cmng-evnt-box-title">
                                    <?php   echo rem_sl($event_name); ?> </a>
                                    <div class="inr-evnt-box-list">
                                        <ul> 
                                            <li><i class="fa fa-calendar"></i> <?php   echo  date('Y-m-d', strtotime($event_stat)); ?> </li>
                                            <li><i class="fa fa-map-marker"></i>  <?php   echo event_country($country); ?>  </li>
                                            <li><i class="fa fa-map-marker"></i> <?php   echo $city; ?> </li>
                                           <!-- <li><i class="fa fa-book"></i> --!> <?php //echo event_topic($event_topic);  ?>  </li>
                                            
                                        </ul>
                                    </div>
                                    <a href="<?php echo $base_url; ?>conf-detail.php?ev_id=<?php   echo $event_id; ?>&name=<?php   echo str_replace(" ","-",$event_name);?>" target="_blank" class="inr-up-cmng-evnt-link"> <i class="fa fa-chevron-right"> </i></a>

                                </div>




            

  