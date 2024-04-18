<div class="tab-sec">

	<div class="tab-content">

		<div id="home" class="tab-pane fade in active">

			<div class="up-comming-sec">

				<div class="row">



					<?php

					$limit = 50;

					$adjacents = 2;





					if (isset($_REQUEST['date'])) {

						$date_class = "hide";

						$date = $_REQUEST['date'];

						$sqlcntfrpgntn = "SELECT COUNT(*) 'total_rows' FROM `event` WHERE `city` = '$city' and `status`='Accept' and `event_stat` like '$date%' and  `event_stat` >= curdate()";
					} else

						$sqlcntfrpgntn = "SELECT COUNT(*) 'total_rows' FROM `event` WHERE `city` = '$city' and ( `status`='Accept' and `event_stat` > curdate() )";









					$rescntpgntn = mysqli_fetch_object(mysqli_query($link, $sqlcntfrpgntn));

					$total_rows = $rescntpgntn->total_rows;

					if ($total_rows > 0) {

						$total_pages = ceil($total_rows / $limit);

						if (isset($_GET['page']) && $_GET['page'] != "") {

							$page = $_GET['page'];

							$offset = $limit * ($page - 1);
						} else {

							$page = 1;

							$offset = 0;
						}



						if (isset($_REQUEST['date'])) {

							$date = $_REQUEST['date'];

							$exe_sql_homecon_list = "SELECT * FROM `event` WHERE `city` = '$city' and `status`='Accept' and `event_stat` like '$date%' and  `event_stat` >= curdate() ORDER BY `event_stat` ";
						} else

							$exe_sql_homecon_list = "SELECT * FROM `event` WHERE `city` = '$city' and ( `status`='Accept' and `event_stat` > curdate() ) ORDER BY `event_stat` ASC limit $offset, $limit";











						$sql_homecon_list = mysqli_query($link, $exe_sql_homecon_list);

						$cur_m = "";



					?>

						<table class="table listing_table">

							<tr class="data">

								<th colspan="1">

									Date

								</th>

								<th>

									Conference Name

								</th>

								<th>

									Venue

								</th>

							</tr>



							<?php

							while ($accept_data = mysqli_fetch_array($sql_homecon_list)) {

								$eventhomestdt = $accept_data['event_stat'];

								$eventhomeid = $accept_data['event_id'];

								$eventhomenm = $accept_data['event_name'];

								$eventhomecty = $accept_data['city'];

								$eventhomecntry = $accept_data['country'];



								extract($accept_data);

								include('list_thumb_tr.php');
							}

							?>



						</table>



						<div class="pull-right" <?php if (isset($date_class)) echo "style='display:none'"; ?>>



							<?php

							if ($total_pages <= (1 + ($adjacents * 2))) {

								$start = 1;

								$end   = $total_pages;
							} else {

								if (($page - $adjacents) > 1) {

									if (($page + $adjacents) < $total_pages) {

										$start = ($page - $adjacents);

										$end   = ($page + $adjacents);
									} else {

										$start = ($total_pages - (1 + ($adjacents * 2)));

										$end   = $total_pages;
									}
								} else {

									$start = 1;

									$end   = (1 + ($adjacents * 2));
								}
							}



							if ($total_pages > 1) {

							?>

								<ul class="pagination pagination-sm justify-content-center">

									<li class='page-item <?php ($page <= 1 ? print 'disabled' : '') ?>'>

										<a class='page-link' href='?page=1'>&lt;&lt;</a>

									</li>

									<li class='page-item <?php ($page <= 1 ? print 'disabled' : '') ?>'>

										<a class='page-link' href='?page=<?php ($page > 1 ? print($page - 1) : print 1) ?>'>&lt;</a>

									</li>

									<?php for ($i = $start; $i <= $end; $i++) { ?>

										<li class='page-item <?php ($i == $page ? print 'active' : '') ?>'>

											<a class='page-link' href='?page=<?php echo $i; ?>'><?php echo $i; ?></a>

										</li>

									<?php } ?>

									<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '') ?>'>

										<a class='page-link' href='?page=<?php ($page < $total_pages ? print($page + 1) : print $total_pages) ?>'>&gt;</a>

									</li>

									<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '') ?>'>

										<a class='page-link' href='?page=<?php echo $total_pages; ?>'>&gt;&gt;</a>

									</li>

								</ul>

						<?php

							}
						} else {

							echo "<strong style='color:red;'>No Data Found !!!</strong>";
						}

						?>

						</div>

				</div>

			</div>

		</div>



















	</div>

</div>







<?php



?>