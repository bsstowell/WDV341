<?php

    /*algorithm to do a PDO prepared statement
        1. Connect to the database
        2. Write your SQL command
        3. Prepare Statement
        4. Bind parameters (if any)
        5. Execute the statement
    */
    require 'dbConnect.php';

    $sql = "SELECT events_name, events_description, events_presenter, events_date FROM wdv341_events WHERE events_id='3'";

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
    <title>PHP Select Events from Database</title>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
</style>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h3>Unit-7.2 Select One Event from Database</h3>

        <?php

        while ($row = $stmt->fetch() ) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Event: ";
            echo $row['events_name'];
            echo "</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Event Description: ";
            echo $row['events_description'];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Event Presenter: ";
            echo $row['events_presenter'];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Event Date: ";
            $date=date_create( $row['events_date'] );
            echo date_format($date, "l, n/d/Y");
            echo "</td>";
            echo "</tr>";
            echo "</table>";
        }

        ?>
    </p>
    
</body>
</html>