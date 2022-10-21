<?php

    //This page will access the database for an event. It will format that event
    //into a PHP object. Then format the PHP object into a JSON formatted object,
    //echo the JSON object back to the client.

    //1. get our data from the database
    //2. create a PHP object from the data
    //3. convert the PHP object into a JSON formatted object


     /*
        Algorithm to do a PDO Prepared statment
            1. Connect to the database
            2. Write you SQL command
            3. Prepare the statement
            4. Bind parameters (if any)
            5. Execute the statement
            6. Get the data from the result-set within the statement object
    */

    $eventsID = 3;

    require 'dbConnect.php';

    $sql = "SELECT events_id,events_name,events_description,events_presenter,events_date,events_time FROM wdv341_events
    WHERE events_id=:eventId";
    //echo $sql;

    $stmt = $conn->prepare($sql);       //create a 'statement object'

    $stmt->bindParam(':eventId', $eventsID);         //bind value of 1 to the named parameter in the statement

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);      //return an associate array from result set

    class Event {

        //general information

        //Event class is used to define an Event object using columns from the events_table
        //in the WDV341 database

        //properties
        public $events_id;
        public $events_name;
        public $events_description;
        public $events_presenter;
        public $events_date;
        public $events_time;

        //constructor method (if any)
        //methods

    }//end of class Event

    //create new event object to store the data

    $outputObj = new Event(); //instantiate/create a new object stored in the variable
    

    //get the data from the result-set
    $row = $stmt->fetch();

    //load the data from the table into the new object
    $outputObj->events_id = $row["events_id"];
    $outputObj->events_name = $row["events_name"];
    $outputObj->events_description = $row["events_description"];
    $outputObj->events_presenter = $row["events_presenter"];
    $outputObj->events_date = $row["events_date"];
    $outputObj->events_time = $row["events_time"];

    //convert the PHP object into a JSON formatted object.
    $eventJSON = json_encode($outputObj);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - JSON Event Object</title>

</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Unit-9 Formatting JSON output</h2>
    <h3>JSON Event Object from PHP</h3>

    <?php
        echo $eventJSON;
    ?>
</body>
</html>