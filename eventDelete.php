<?php

    session_start();
    if ($_SESSION['validUser'] !== "yes") {
        header('Location: login.php');
    }

    //get eventId from the $_GET super global

    $eventId = $_GET["eventId"];  //should pull the value from the Get parameter

    //This page will delete a specific event using eventId get parameter
    //This page should be protected from unwanted access
    //This page will not communicate with the user, does NOT need any HTML/view
    //This page is called from the eventList.php page and should return there when finished

    //echo "You have reached the eventDelete.php page. Event ID: $eventId";

    try{
        require_once('dbConnect.php');

        $sql = "DELETE FROM wdv341_events WHERE events_id = :eventId";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':eventId', $eventId);

        $stmt->execute();
    }
    catch(PDOException $e){
        echo "Problems deleting record from table " . $e->getMessage();
    }

    header('Location: eventList.php'); //when finished return to eventList and display events
?>