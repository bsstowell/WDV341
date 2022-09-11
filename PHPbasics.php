<?php

$yourName = "Brian";

$number1 = 7;
$number2 = 4;
$total = $number1 + $number2;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDV341 PHP</title>
</head>

<script>

    <?php echo "let webDevLang = ['PHP', 'HTML', 'JavaScript']"; ?>;

    console.log(webDevLang);

</script>
<body>

<?php

echo "<h1>Unit 3 - PHP Basics</h1>"

?>

<h2>My Name is <?php echo $yourName ?>.</h2>

<p> number1 = 
<?php echo $number1 ?>
</p>

<p> number2= 
<?php echo $number2 ?>
</p>

<p> The total of number1 + number2 =
    <?php echo $total ?>
</p>

    <?php 
        $webDevLang = array("PHP", "HTML", "JavaScript");
        $arrlength =  count($webDevLang);
 
        for($x = 0; $x < $arrlength; $x++) {
            echo $webDevLang[$x];
            echo "<br>";
        }
     
     ?>
 
 <p>
    <script>

        document.write(webDevLang);

 </script>
 </p>
 
</body>
</html>