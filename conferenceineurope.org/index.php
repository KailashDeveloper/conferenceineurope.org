<?php
ob_start();
if (!isset($_SESSION))session_start();
?>

<!DOCTYPE html>



<html lang="en">

<head>

<?php include('script.php'); ?>

<title>Conference in Europe 2024 -  International Academic Conferences in Europe</title>

<meta name="keywords"content="International Conferences in Europe, Engineering Conferences in Europe, Conferences in Europe , Business Conferences in Europe , Europe  Conferences 2024, Upcoming Conferences in Europe , Academic Conferences in Europe , Call for Paper in Europe, Paper Submission, Engineering Conferences 2024"/>

<meta name="description" content="Upcoming Conference in Europe 2024. Find the list of upcoming conferences in Europe through our website. Subscribe today to get future conferences in Europe in your inbox." />
</head>

<body>

<?php include('header.php'); ?>

<?php include('home_country.php'); ?>

<?php include('home_topics.php'); ?>

<?php include('home_conferences.php'); ?>

<?php //include('//.php'); ?>
<?php echo $city ?>

<?php include('footer.php'); ?>

</body>

</html>