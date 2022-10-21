<?php

    $futureDueDate = mktime(0,0,0,11,22,2022);

    $dueDate = date("n/j/Y", $futureDueDate);

    $internationalDueDate = date("j/n/Y", $futureDueDate);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<p>
    The due date is: <?php echo $dueDate; ?>
</p>

<p>
    The internation due date is: <?php echo $internationalDueDate; ?>
</p>

<p>
    <?php 
        $txt = "Go Broncos!";
        $txtSpace = " go broncos ";
    ?>

    Number of characters in 'Go Broncos' is: <?php echo strlen($txt); ?>
</p>

<p>Removing whitespace from both sides of ' go broncos ' is: <?php echo trim($txtSpace); ?></p>

<p>
    <?php
        $broncos = "BRONCOS";
    ?>

    Changing string 'BRONCOS' to lowercase: <?php echo strtolower($broncos); ?>
</p>

<p>
    <?php
    $word = "DMACC";
    $mystring = "I am as student at DMACC.";
    ?>

    Whether or not string "I am a student at DMACC" contains "DMACC": <?php echo stripos($mystring, $word);?>
</p>

<p>
    <?php 
        $numberPhone = '+1234567890';
	    $result = sprintf("%s-%s-%s", substr($numberPhone, 1, 3), substr($numberPhone, 4, 3), substr($numberPhone, 7));
    ?>

    The string 1234567890 formatted into a phone number is: <?php echo $result?>
</p>

<p>
    <?php
        $numberMoney = 123456;
        $format_number = "$" . number_format($numberMoney, 2, '.', ',');
    ?>

    The number 123456 formatted into U.S. currency is: <?php echo $format_number?>

</p>


Instructions:
Create a function that will accept a timestamp and format it into mm/dd/yyyy format.
Create a function that will accept a timestamp and format it into dd/mm/yyyy format to use when working with international dates.
Create a function that will accept a string input.  It will do the following things to the string:
Display the number of characters in the string
Trim any leading or trailing whitespace
Display the string as all lowercase characters
Will display whether or not the string contains "DMACC" either upper or lowercase
Create a function that will accept a number and display it as a formatted phone number.   Use 1234567890 for your testing.
Create a function that will accept a number and display it as US currency with a dollar sign.  Use 123456 for your testing.
</body>
</html>