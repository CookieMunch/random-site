<!DOCTYPE html>
<html>
<head>
	<title> LAB 07 Part 1 </title>
	<meta charset="UTF-8">
	<meta name="description" content="CPS530 lab5 part 1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="text-center">

	<?php
	$string = file_get_contents("cache_yr2.json");
	$json = json_decode($string);

	echo '<div class="container p-100"><h1>';
	if (isset($json->radurl))
	{
		echo '<a href="' . $json->radurl . '">' . $json->radioname . '</a>';
	}
	else {
		echo $json->radioname;
	}
	echo '</h1></div><br><br>';
	$track = $json->track;
	echo '<div class="container">';
	if (isset($track->cover))
	{
		echo '<img src="' . $track->cover . '" alt="">';
	}
	echo '</div>';
	echo '<div class="container">';
	echo '<h3> Title: ' . $track->title . '</h3>';
	echo '<h3> Artists: ' . $track->artists . '</h3>';
	$time = new DateTime($track->starttime, new DateTimeZone('CET'));
	$time->setTimezone(new DateTimeZone('EST'));
	echo '<h3> Start Time: ' . $time->format('Y-m-d H:i:s') . '</h3>';
	$duration = $track->playduration;
	echo '<h3> Duration: ' . substr($duration, 0, 2) . ":" . substr($duration, 2, 2) . ":" . substr($duration, 4, 2) .'</h3>';

	echo '</div>';

	header("Refresh:240");
	?>


</body>
</html>
