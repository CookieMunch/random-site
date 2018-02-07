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
	$request_url = "http://107.170.98.130/yr2/cache_yr2.txt";
	ini_set("allow_url_fopen", "On");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $request_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);

	$xml=new SimpleXMLElement($data) or die("Error: Cannot create object");
	echo '<div class="container p-100"><h1>';
	if (isset($xml->radurl))
	{
		echo '<a href="' . $xml->radurl . '">' . $xml->radioname . '</a>';
	}
	else {
		echo $xml->radioname;
	}
	echo '</h1></div><br><br>';
	$track = $xml->track;
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
