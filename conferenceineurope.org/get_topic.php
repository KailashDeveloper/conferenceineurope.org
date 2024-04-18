<?php include('mysqli_dbconn.php');
$cat_id=$_REQUEST['cat_id'];
 ?>
	
	        <select name="evt_topic" id="evt_topic" class="form-control">
				  <option  value="0">Select One Topic</option>
					 <?php
				  $sql_topic=mysqli_query($link,"SELECT * FROM `event_topic` WHERE `cat_id`=$cat_id ORDER BY `topic` ASC");
				  while($topic_data=mysqli_fetch_array($sql_topic))
				  {
				   ?>
                   <option  value="<?php echo $cat_id."###".$topic_data['topic_id']."###".$topic_data['topic']; ?>"><?php echo $topic_data['topic']; ?></option>
                    <?php
					}
					?> 
  </select>