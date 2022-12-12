<?php

    /*algorithm to do a PDO prepared statement
        1. Connect to the database
        2. Write your SQL command
        3. Prepare Statement
        4. Bind parameters (if any)
        5. Execute the statement
    */
    require 'dbConnect.php';

    $sql = "SELECT events_name, events_description, events_presenter, events_date FROM wdv341_events ORDER BY events_name";

    $stmt = $conn->prepare($sql);       //prepare your statement

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        .eventName {
            font-size: 20px;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>

        <?php

        while ($row = $stmt->fetch() ) {
            echo "<div class='eventName'>Event: ";
            echo $row['events_name'];
            echo "</div>";
            echo "<div>Event Description: ";
            echo $row['events_description'];
            echo "</div>";
            echo "<div>Event Presenter: ";
            echo $row['events_presenter'];
            echo "</div>";
            echo "<div>Event Date: ";
            $date=date_create( $row['events_date'] );
            echo date_format($date, "l, n/d/Y");
            echo "</div>";
            echo "<br>" ;
            echo "\r\n";
        }

        ?>
    </p>
    
</body>
</html>