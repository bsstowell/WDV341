<?php

    session_start();
    if ($_SESSION['validUser'] !== "yes") {
        header('Location: adminLogin.php');
    }

    //get guestId from the $_GET super global

    $guestId = $_GET["guestId"];  //should pull the value from the Get parameter

    //This page will delete a specific event using eventId get parameter
    //This page should be protected from unwanted access
    //This page will not communicate with the user, does NOT need any HTML/view
    //This page is called from the eventList.php page and should return there when finished

    //echo "You have reached the eventDelete.php page. Event ID: $eventId";

    try{
        require_once('dbConnectServer.php');

        $sql = "DELETE FROM guest_reservations WHERE guest_id = :guestId";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':guestId', $guestId);

        $stmt->execute();
    }
    catch(PDOException $e){
        echo "Problems deleting record from table " . $e->getMessage();
    }

    header('Location: reservationList.php'); //when finished return to eventList and display events

    echo "Guest Reservation was successfully deleted from the database."

?>