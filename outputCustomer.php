<?php

    $customerName = "Mary";
    $customerNumber = 3454;
    $customerDisc = 10;
    $customerYears = 9;


    if($customerYears < 4){
        //echo "New Customer";
        $customerStatus = "New Customer";
    }
    else {
        if($customerYears >3 && $customerYears < 9) {
        //echo "Good Customer";
        $customerStatus = "Good Customer";
        }

        else {
        //echo "Strong Customer";
        $customerStatus = "Strong Customer";
        }
    }

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
    <h1>WDV341 Intro PHP</h1>
    <h2>Use PHP to fill out a Customer profile</h2>

    <h3>Customer Name: <?php echo $customerName; ?></h3>
    <p>Customer Number: <?php echo $customerNumber; ?></p>
    <p>Customer discount: <?php echo $customerDisc; ?></p>
    <p>Customer #Years: <?php echo $customerYears; ?></p>
    <p>Customer Status: <?php echo $customerStatus; ?></p>

    <?php

       



    ?>

</body>
</html>