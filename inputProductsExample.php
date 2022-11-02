<?php

    //$_POST is an associative array - the index is a word instead of a number
    $formProcessed = 'false';

    if(isset($_POST['submit'])){
        //form submitted, process form data
        echo "<h1>The form has been submitted</h1>";

        $productName = $_POST['product_name'];
        $productPrice = $_POST['product_price'];

        echo "<p>You entered Product Name: $productName</p>";
        echo "<p>You entered Product Price: $productPrice</p>";

        $formProcessed = true;  //is a flag, if true form data has been submitted into the database

    }
    else {
        //display form
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

    <header>
        <h1>Product Input Form</h1>
    </header>
    <main>
        <h2>Please enter the product information</h2>
        <?php

            if($formProcessed) {
                //display a message
                echo "<h2>the form has been processed.</h2>";
                //confirmation message - form data has been processed into the database
            }
            else{
                //display form
                //echo "<h2>Display the Form</h2>";
            
        ?>
        <form method="post" action="inputProductsExample.php">

            <p>
                <label for="product_name">Product Name: </label>
                <input type="text" name="product_name" id="product_name">
            </p>

            <p>
                <label for="product_price">Product Price: </label>
                <input type="text" name="product_price" id="product_price">
            </p>

            <p>
                <input type="submit" name="submit" value="Submit" >
                <input type="reset" >
</p>

        </form>
            <?php
                }
            ?>
</main>
<footer>
</footer>
    
</body>
</html>