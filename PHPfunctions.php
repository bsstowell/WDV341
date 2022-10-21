<?php
	$timestamp = time(); 
	
	date_default_timezone_set('Asia/Kolkata');
	$currentTime = date('d/m/Y', time());


	$inputString = " Welcome to DMACC! ";
	
	$numberPhone = '+1234567890';
	$result = sprintf("%s-%s-%s", substr($numberPhone, 1, 3), substr($numberPhone, 4, 3), substr($numberPhone, 7));


	$numberMoney = 123456;
	$english_format_number = "$" . number_format($numberMoney, 2, '.', ',');
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Functions</title>
</head>

<body>
	
	<h1>WDV341 Intro PHP</h1>
	<h2>Unit-4 PHP Functions</h2>
	
	<p>Today's timestamp is <?php echo(date("m/d/Y", $timestamp)); ?>.</p>
	
	<p>Today's timestamp according to the current timezone in Asia is <?php echo $currentTime; ?>.</p>
	
	<p>The length of the string " Welcome to DMACC " is <?php echo strlen($inputString); ?>.</p>
	
	<p>The string " Welcome to DMACC " with the extra white space trimmed away: <?php echo trim($inputString, " "); ?></p>
	
	<p>This is the string in all lowercase letters:<?php echo strtolower($inputString); ?>.</p>
	
	<p>Here is the string in all uppercase letters:<?php echo strtoupper($inputString); ?>.</p>
	
	<p>Here is the first character position of "DMACC" in the listed string. If it is not found it will return FALSE: <?php echo strpos($inputString, "DMACC"); ?>.</p>
	
	
	<p>Here is the number 1234567890 formatted into a phone number: <?php echo $result; ?>.</p>
	
	
	<p>Here is the number 123456 formatted into US currency: <?php echo $english_format_number; ?></p>
	
	
	
	
</body>
</html>