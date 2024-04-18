<div class="inr-left-sec">

                                <h3> <?php echo $_SESSION['LOGIN_USER']; ?></h3>
                                <div class="inr-topic-list">
                                    <ul>
                                 <li> <a href="organizer.php"> Organizer panel </a></li>
                                    <li> <a href="org_add_event.php"> Add Event </a></li>
                                    <li> <a href="accepted_events.php"> Accepted Event </a></li>
                                    <li> <a href="new_events.php"> News Event </a></li>
                                    <li> <a href="success_events.php"> Success Event </a></li>
                                    <li> <a href="pending_events.php"> Pending Event </a></li>
                                    <li> <a href="permanent_rejected_events.php"> Permanent Rejected Event </a></li>
                                    <li> <a href="temp_rejected_events.php"> Temp Rejected Event </a></li>
                                    <li> <a href="edit_organizer.php"> Edit  Organizer  </a></li>
                                   <li> <a href="chnage_password.php"> chnage  Password  </a></li>

                            
                                    </ul>
                                </div>


                                

                            </div>
                            
                            
                             <?php

$org=$_SESSION['LOGIN_USER'];

$sql_det=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `org_detail` WHERE `org_mail`='$org'"));

 $org_id=$sql_det['org_id'];

?>	