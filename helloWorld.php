<?php
    //PHP controller and/or model area

    //create PHP variable

    $customerName = "Mary";  //created a variable, data type of string
                            //global scope variable

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDV341 Hello World Page</title>

    <style>

        <?php echo "h1 {color: red}"; ?>

    </style>

    <script>

        <?php
            echo "let userName = 'Joe';";
        ?>

        console.log(userName);

        let cars = [<?php echo "'ford', 'honda', 'chevy'" ?>];

    </script>

</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Unit-3 PHP Basics</h2>

    <?php

        echo "<p>This paragraph was created by PHP.</p>";

    ?>
    <h3>Welcom Back <?php echo $customerName ?></h3>

</body>
</html>