<?php
    session_start();
    if ($_SESSION['validUser'] !== "yes") {
        header('Location: login.php');
    }

    //Add this page to the Admin section for our application, include the SESSION info
    //This page will list the events from the database into a table format.
    //We will add a button to DELETE to each event. This will call the DELETE page.
    //We will add a button to UPDATE each event. This will call the eventUpdate.php page.

    //Delete button will do the following:
    // call the eventDelete.php page
    // pass in the event Id of the selected event, the event you wish to delete

    /*algorithm to do a PDO prepared statement
        1. Connect to the database
        2. Write your SQL command
        3. Prepare Statement
        4. Bind parameters (if any)
        5. Execute the statement
    */
    require 'dbConnect.php';

    $sql = "SELECT events_id, events_name, events_description, events_presenter, events_date FROM wdv341_events ORDER BY events_name";

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

        table, th, td {
            border: thin solid black;
        }

    </style>
</head>
<body>
    <header>
        <h1>WDV341 Intro PHP</h1>
        <h3>Event Listing</h3>
    </header>

    <nav>
        <div><a href="login.php">Home</a></div>
    </nav>
    
    <div>
        <table>
            <?php
                while ($row = $stmt->fetch() ) {

                    echo "<tr>";
                    echo "<td>Event: ";
                    echo $row['events_name'];
                    echo "</td>";
                    echo "<td>Event Description: ";
                    echo $row['events_description'];
                    echo "</td>";
                    echo "<td>Event Presenter: ";
                    echo $row['events_presenter'];
                    echo "</td>";
                    echo "<td>Event Date: ";
                    $date=date_create( $row['events_date'] );
                    echo date_format($date, "l, n/d/Y");
                    echo "</td>";
                    echo "<td>";
                    echo "<button>Update</button>";
                    echo "</td>";
                    echo "<td>";
                            $eventId = $row['events_id'];   //save events_id into a PHP variable
                    echo "<button><a href='eventDelete.php?eventId=$eventId'>Delete</a></button>";
                    echo "</td>";
                    echo "</tr>" ;
                    echo "\n\r";
                }
        ?>
        </table>
    </div>

    
</body>
</html>