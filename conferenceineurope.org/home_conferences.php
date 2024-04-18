<section class="up-cmng-evnt">
	<div class="container">
		<div class="conf-title-sec text-center mbt50">
			<div class="conf-title">
				<h2>List of Upcoming Conferences In Europe 2024</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php
				$listcountry = implode(",", $listcountry);

				$exe_sql_homecon_list = "SELECT * FROM `event` WHERE `status`='Accept' and `event_stat` > curdate() and `country` IN  ($listcountry) ORDER BY `event_stat` ASC limit 0,20";
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

			</div>
			<div class="col-md-4"></div>
			<div class="col-md-4"><button class="all-cont-btn"><a href="all_european_countries.php" style="color: white;">Find More European Conferences</a></button></div>
			<div class="col-md-4"></div>
			<style>
				.a_link a:hover {
					color: #D40510;
				}
			</style>
			<div class="col-md-12">
				<div class="a_link">
					<a href="./">International Conferences in Europe</a>, <a href="./">Engineering Conferences in Europe</a>, <a href="./">Conferences in Europe</a> , <a href="./">Business Conferences in Europe</a> , <a href="./">Europe Conferences 2024</a>, <a href="./">Upcoming Conferences in Europe</a> , <a href="./">Academic Conferences in Europe</a> ,<a href="./"> Call for Paper in Europe</a>, <a href="./">Paper Submission in Europe</a> , <a href="./">Engineering Conferences 2024</a>, <a href="./">International Europe Conferences</a>
				</div>
			</div>
		</div>
	</div>
</section>