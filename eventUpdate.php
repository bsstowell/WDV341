<?php
session_start();    
if ($_SESSION['validUser'] !== "yes"){
    //return to login page
    header('Location: login.php');      //redirect back to the home page
}

$successfulUpdate = false;      //use this to switch on confirmation message

if(isset($_POST['submit'])){
    //if the form has been seen by the user AND submitted by the user
    //Do the UPDATE

    //echo "<h1>Form has been submitted!</h1>";

    //get the data from the $_POST variable
    $eventId = $_GET['eventId'];
    $eventName = $_POST['events_name'];
    $eventDesc = $_POST['events_description'];

    //connect to database 
    try {
        require_once('database/dbConnect.php');

        $sql = "UPDATE wdv341_events 
                SET events_name = :eventName,
                    events_description = :eventDesc

                WHERE events_id = :eventId";

        //echo "<p>$sql</p>";

        $stmt = $conn->prepare($sql);

        //echo "<p>$eventId</p>";
        //echo "<p>$eventName</p>";
        //echo "<p>$eventDesc</p>";

        $stmt->bindParam(':eventId',$eventId);
        $stmt->bindParam(':eventName',$eventName);
        $stmt->bindParam(':eventDesc',$eventDesc);

        $stmt->execute();  
        
        $successfulUpdate = true;       //use this to switch on the confirmation message
    }
    catch(PDOException $e) {
        echo "Problems updating the record from the events." . $e->getMessage();
    }
    //if everthing works I have updated the record
    //provide a confirmation message

}
else{
    //need to get the record from the database and display the field values on the form
    //display the form

    $eventId = $_GET["eventId"];    //should pull the value from the Get parameter

    //echo "<h1>Update eventid $eventId</h1>";
    try {
        require_once('database/dbConnect.php');

        $sql = "SELECT  events_id, 
                        events_name, 
                        events_description, 
                        events_presenter,
                        events_date,
                        events_time
                FROM wdv341_events 
                WHERE events_id = :eventId";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':eventId',$eventId);

        $stmt->execute();         
    }
    catch(PDOException $e) {
        echo "Problems deleting the record from the events." . $e->getMessage();
    }
    //I should have one record in the result from the database
    $row = $stmt->fetch();      //get the field data into an associative arrays
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
    <h1>Event Administration</h1>
    <h2>Update Event</h2>

    <?php 
        /*
            if you successfully update the database
                display Confirmation Message, link to the home page
            else
                display form with the data from the database

        */

    ?>

<?php 
    if($successfulUpdate){
        //display message section
        echo "<h3>Your update is successful.</h3>";
        echo "<p>Return to the <a href='eventList.php'>List of Events</a></p>";
    }
    else{
        //display the form section 
?>
    <form method="post" action="eventUpdate.php?eventId=<?php echo $row['events_id']?>">

        <p>
            <label for="event_name">Event Name:</label>
            <input type="text" name="events_name" id="events_name" value="<?php echo $row['events_name']; ?>">
        </p>

        <p>
            <label for="event_description">Event Description:</label>
            <input type="text" name="events_description" id="events_description" size="200" value="<?php echo $row['events_description']; ?>">
        </p>

        <p>
            <input type="submit" name="submit" value="Update Event">
            <input type="reset">
        </p>

    </form>
<?php
    }   //close the form section, displayed at beginning with the record data
?>    
</body>
</html>