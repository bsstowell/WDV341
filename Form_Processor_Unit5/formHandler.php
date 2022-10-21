<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Handler Unit 5 PHP</title>

</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>UNIT 5 PHP Form Processing</h2>

<?php

	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of Field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";

?>

<div>

	<h3>
		Dear <?php echo $_POST["first_name"];?>,
	</h3>
	<p>Thank you for your interest in DMACC.</p>
	<p>We have you listed as a <?php echo $_POST["year"];?> starting this fall semester.</p>
	<p>You have declared <?php echo $_POST["majors"];?> as your new major.</p>
	<p>Based upon your responses, we will provide the following information in our confirmation
		email to you at <?php echo $_POST["email_address"];?>.
	</p>

	<ul>
		<?php
			if (isset($_POST['info'])) {
				echo "<li>Program information regarding your selected Major</li>";
			}
			if(isset($_POST['advise'])) {
				echo "<li>Contact information for your advisor</li>";
			}
		?>
	</ul>

	<p>You have shared the following comments which we will review: </p>
		<ul>
		<li><?php echo $_POST["comments"]; ?></li>
		</ul>
	

	<p>We look forward to you joining the DMACC family this fall!</p>
	
</div>

</body>
</html>
