<?php
    session_start();
    if ($_SESSION['validUser'] !== "yes"){
        //return to login page
        header('Location: login.php');      //redirect back to the home page
    }

    //-Add this page to the Admin section for our application, include the SESSION info
    //-This page will list the events from the database into a table format.
    //-We will add a button to DELETE to each event.  This will call the eventDelete.php page.
    //-We will add a button to UPDATE each event. This will call the eventUpdate.php page.

    //Delete button will do the following:
    //  -Call the eventDelete.php page
    //  Pass in the event Id of the selected event, the event you wish to delete


    /* Algorithm to do a PDO Preprared statement
        1. Connect to the database
        2. Write your SQL command
        3. Prepare the statement
        4. Bind parameters (if any)
        5. Execute the statement
    */

    require 'database/dbConnect.php';  
    
    //$sql = "SELECT events_name,events_description,events_presenter,events_date FROM wdv341_events WHERE events_id = '1' ORDER BY events_name";
    $sql = "SELECT events_id, events_name,events_description,events_presenter,events_date FROM wdv341_events ORDER BY events_name";


    $stmt = $conn->prepare($sql);               //prepare your statement object

    $stmt->execute();           //execute the SQL code of the prepared statement

    $stmt->setFetchMode(PDO::FETCH_ASSOC);    //




    
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
            font-size:20px;
            font-weight:bold;
        }

        table, th,td {
            border:thin solid black;
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
        while($row = $stmt->fetch() ){      //fetch one row of data into an associative array
                                            //$row associative array, Key-column name, Value-column value
            $eventId = $row['events_id'];   //save events_id into a PHP variable

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
            //echo $row['events_date'];     //moved to next line to input date
            $date=date_create( $row['events_date'] );
            echo date_format($date,"l n/d/Y");
            echo "</td>";
            echo "<td>";
            echo "<button><a href='eventUpdate.php?eventId=$eventId'>Update</a></button>";
            echo "</td>";
            echo "<td>";
            echo "<button><a href='eventDelete.php?eventId=$eventId'>Delete</a></button>";
            echo "</td>";            
            echo "</tr>";
            echo "\n\r"; 
        }
    ?>
        </table>
    </div>
</body>
</html>