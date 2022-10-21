<?php

	$currentDate;

	$date = date_create();

	$outputDate = date_format($date, "m-d-Y");

	$midTermDate = date_create("2021-10-20");


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Date format</title>
</head>

<body>
	
	<h1>WDV341 Intro PHP</h1>
	<h2>Unit-4 Functions and Dates</h2>
	
	<p>Today is <?php echo $outputDate; ?> </p>
	<p>The midterm date is <?php echo date_format($midTermDate, "l, F jS, Y"); ?>.</p>
	
</body>
</html>
