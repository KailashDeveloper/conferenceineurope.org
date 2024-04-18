<tr class="data1">
<td><a href="<?php echo $base_url; ?>conf-detail.php?ev_id=<?php   echo $accept_data['event_id']; ?>&name=<?php   echo str_replace(" ","-",$event_name); ?>" class="topic-confr " target="_blank"><span><?php echo   date('d M',strtotime($accept_data["event_stat"])); ?></span> </a></td>

<td style="text-align: left"><a href="<?php echo $base_url; ?>conf-detail.php?ev_id=<?php   echo $accept_data['event_id']; ?>&name=<?php   echo str_replace(" ","-",$event_name); ?>" class="topic-confr " target="_blank"><?php echo $accept_data["event_name"]; ?></a></td> 

<td><strong><a href="<?php echo $base_url; ?>conf-detail.php?ev_id=<?php   echo $accept_data['event_id']; ?>&name=<?php   echo str_replace(" ","-",$event_name); ?>" class="topic-confr " target="_blank">

<?php echo $city.", ". event_country($country); ?>
</a></strong></td>
</tr>