<?php
include("mysqli_dbconn.php");
include("fun.php");
include("config.php");
include("month_calc.php");
?>
<?php
$pp = $_SERVER['PHP_SELF'];
$pp = explode("/", $pp);
$sz = sizeof($pp);
$pp = $pp[$sz - 1];
?>
<?php
$crntyrs = date('Y');
$crntyrsa = $crntyrs + 1;
$page_url = "https://www.conferenceineurope.org" . $_SERVER['PHP_SELF'];
$only_link = "";
$only_link .= $_SERVER['HTTP_HOST'];
$only_link .= $_SERVER['PHP_SELF'];
$only_link = str_replace("www.", "", $page_url);
$sql_new_ev = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `meta` where `url` = '$only_link'"));
if (!empty($sql_new_ev)) {
	extract($sql_new_ev);
	$page_title = $meta_title;
	$page_description = $meta_desc;
	$page_keyword = $meta_keywords;
} else {
	if (basename($_SERVER['PHP_SELF']) == 'index.php' || basename($_SERVER['PHP_SELF']) == "") {
		$page_title = "Conference in Europe: Upcoming International Conferences in Europe";
		$page_description = "Find the list of upcoming conferences in Europe. Subscribe today to get future conferences in Europe in your inbox & get free conference for international conferences in Europe 2024";
		$page_keyword = "Conference in Europe, Conference in Europe 2024, European Conferences, European Conference 2024, International Conference in Europe, Academic Conferences in Europe";
	} else if (basename($_SERVER['PHP_SELF']) == 'register.php') {
		$page_title = "Registration : Conference in Europe";
		$page_description = "Conference for upcoming academic conferences in Europe. Subscribe to Conference in Europe & get free conference for international conferences in Europe.";
		$page_keyword = "";
	} else if (basename($_SERVER['PHP_SELF']) == 'add_event.php') {
		$page_title = "Add Event : Conference in Europe";
		$page_description = "Conference for upcoming academic conferences in Europe. Subscribe to Conference in Europe & get free conference for international conferences in Europe.";
		$page_keyword = "";
	} else if (basename($_SERVER['PHP_SELF']) == 'about_us.php') {
		$page_title = "About Us : Conference in Europe";
		$page_description = "Conference for upcoming academic conferences in Europe. Subscribe to Conference in Europe & get free conference for international conferences in Europe.";
		$page_keyword = "";
	} else if (basename($_SERVER['PHP_SELF']) == 'advancesearch.php') {
		$page_title = "Advance Search : Conference in Europe";
		$page_description = "Conference for upcoming academic conferences in Europe. Subscribe to Conference in Europe & get free conference for international conferences in Europe.";
		$page_keyword = "";
	} else if (basename($_SERVER['PHP_SELF']) == 'contact_us.php') {
		$page_title = "Contact Us : Conference in Europe";
		$page_description = "Conference for upcoming academic conferences in Europe. Subscribe to Conference in Europe & get free conference for international conferences in Europe.";
		$page_keyword = "";
	} else if (basename($_SERVER['PHP_SELF']) == 'login.php') {
		$page_title = "Login : Conference in Europe";
		$page_description = "Conference for upcoming academic conferences in Europe. Subscribe to Conference in Europe & get free conference for international conferences in Europe.";
		$page_keyword = "";
	} else if (isset($place)) {
		$page_title = "Conferences in $city 2024 - International $city Conference";
		$page_description = "Upcoming international Conferences in $city - Start by searching online for international Conferences in $city 2024. You can choose according to your way of interest from a wide range of conference topics. Subscribe to Conference in Europe & get free conference for academic conferences in Europe.";
		$page_keyword = "Conferences in $city 2024, Upcoming Conferences in $city 2024, International Conferences in $city 2024, Conferences in $city, Academic Conferences in $city, $city Conference, Main Event $city, Upcoming $city Conference, International Academic Conferences in $city, Conferences happening in $city, $city Events, Main Event in $city, Main Conference in $city";
	} else if (isset($country)) {
		// $page_title = "Conferences in $country 2024 - International $country Conference";
		$page_title = "Conferences in $country 2024 | International Conference in $country ";
		$page_description = "Upcoming international Conferences in $country - Start by searching online for international Conferences in $country 2024. You can choose according to your way of interest from a wide range of conference topics. Subscribe to Conference in Europe & get free conference for academic conferences in Europe.";
		// $page_keyword = "Conferences in $country 2024, Upcoming Conferences in $country 2024, International Conferences in $country 2024, Conferences in $country, Academic Conferences in $country, $country Conference, Main Event $country, Upcoming $country Conference, International Academic Conferences in $country, Conferences happening in $country, $country Events, Main Event in $country, Main Conference in $country";
		$page_keyword = "Conferences in $country 2024, Upcoming Conferences in $country 2024, International Conferences in $country 2024, Conferences in $country, Academic Conferences in $country, $country Conference, Main Conference $country, Upcoming $country Conference, International Academic Conferences in $country, Conferences happening in $country, $country Events, Main Event in $country, Main Conference in $country";
	} else if (isset($topic)) {
		$cnt_sql = "SELECT * FROM `event` WHERE `keywords` like '%$topic%' or `event_topic` like '%###$topic###%'    and `status`='Accept' and `event_stat` > curdate() ";
		//$total_result=mysqli_num_rows(mysqli_query($link,$cnt_sql));
		$page_title = "$topic Conference in Europe 2024";
		$page_description = "$topic Conferences 2024, Upcoming $topic Conferences 2024, International $topic Conferences 2024, Conferences in $topic , virtual conferences in $topic , main event in $topic , academic conferences in $topic , video conferences in $topic , webinar in $topic , $topic conferences , $topic events , $topic webinars , all events in $topic , all conferences in $topic , Academic Virtual Conferences in $topic";
		$page_keyword = "$topic Conferences in Europe 2024 -Get conference alerts on upcoming conferences, meetings, seminars, workshops and other associated events in $topic sector in 2024.";
	} else if (isset($_REQUEST['ev_id'])) {
		$ev_id = url_special_char(str_xss($_REQUEST['ev_id']));
		$sql_ev_det = mysqli_query($link, "SELECT * FROM `event` WHERE `event_id` ='$ev_id'");
		$ev_det = mysqli_fetch_array($sql_ev_det);
		extract($ev_det);
		$page_title = " $event_name: Conference in Europe1";
		$page_description = "$short_desc";
		$page_keyword = "";
	} else {
		$page_title = "";
		$page_description = '';
		$page_keyword = '';
	}
}
?>
<meta charset="UTF-8">
<?php if ($page_title != '') { ?>
	<title><?php echo $page_title; ?></title>
	<meta name="description" content="<?php echo $page_description; ?>" />
	<meta name="keyword" content="<?php echo $page_keyword; ?>" />
<?php
}
?>
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="images/favicon.png" />
<link href="css/animate.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<!--<link href="fonts/fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css"/>-->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="css/droopmenu.css?v=1.1" rel="stylesheet" type="text/css" />
<link href="css/slick.css" rel="stylesheet" type="text/css" />
<link href="css/responsive.css?deep" rel="stylesheet" type="text/css" />
<!--<link href="css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css"/>-->
<link href="css/slick.css" rel="stylesheet" type="text/css" />
<!-- <link href="css/jquery.bxslider.css" rel="stylesheet" type="text/css"/>-->
<!--<link href="css/scssstyles.css?v=1.1" rel="stylesheet" type="text/css"/>-->
<link href="css/scssstyles.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<link href="css/style6.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<link href="css/new_responsive.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script language="javascript" src="js/conferencealert.js" type="text/javascript"></script>
<meta name="yandex-verification" content="aac12bd6fd5587d7" />
<!-- JSON-LD markup generated by Google Structured Data Markup Helper. -->
<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "WebSite",
		"name": "Conference In Europe",
		"image": "https://www.conferenceineurope.org/images/logo.png",
		"url": "https://www.conferenceineurope.org/"
	}
</script>
<!-- Google Tag Manager -->
<script>
	(function(w, d, s, l, i) {
		w[l] = w[l] || [];
		w[l].push({
			'gtm.start':
				new Date().getTime(),
			event: 'gtm.js'
		});
		var f = d.getElementsByTagName(s)[0],
			j = d.createElement(s),
			dl = l != 'dataLayer' ? '&l=' + l : '';
		j.async = true;
		j.src =
			'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
		f.parentNode.insertBefore(j, f);
	})(window, document, 'script', 'dataLayer', 'GTM-5NBZLWJ');
</script>
<!-- End Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P5YCEHE3Y4"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());
	gtag('config', 'G-P5YCEHE3Y4');
</script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6291b33efaada80019c43831&product=inline-share-buttons" async="async"></script>
