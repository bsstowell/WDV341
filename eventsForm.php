<?php

$dataProcessed = false;

    if(isset($_POST["submit"])) {
        //form has been submitted by the user
        //process the form data into the database
        //display message form processed successfully
       // echo "<h1>The form has been submitted and will be processed into the database.</h1>";

        $eventsName = $_POST['events_name'];
        $eventsDescription = $_POST['events_description'];
        $eventsPresenter = $_POST['events_presenter'];
        $eventsDate = $_POST['events_date'];
        $eventsTime = $_POST['events_time'];

        $insertDate = date("Y-m-d");
        $updateDate = date("Y-m-d");

    
        require_once('dbConnect.php');

        $eventsDate = date('Y-m-d', strtotime($eventsDate));
        $eventsTime = date('H:i', strtotime($eventsTime));
       
        $sql = "INSERT INTO wdv341_events (events_name, events_description, events_presenter, events_date, events_time, events_date_inserted, events_date_updated)
        VALUES (:eventsName, :eventsDescription, :eventsPresenter, :eventsDate, :eventsTime, :eventsDateInserted, :eventsDateUpdated)";

        $stmt= $conn->prepare($sql);

        $stmt->bindParam(':eventsName',$eventsName);
        $stmt->bindParam(':eventsDescription',$eventsDescription);
        $stmt->bindParam(':eventsPresenter',$eventsPresenter);
        $stmt->bindParam(':eventsDate',$eventsDate);
        $stmt->bindParam(':eventsTime',$eventsTime);
        $stmt->bindParam(':eventsDateInserted',$insertDate);
        $stmt->bindParam(':eventsDateUpdated',$updateDate);


        $stmt->execute();

        $dataProcessed = true;  //act as a flag or switch to use later
    
    }//form needs processed

         //display the form to the user so they can enter their information and hit submit
?>
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV 341 Intro PHP - Events Form</title>
    
<style> 

* {
    box-sizing: border-box;
}

body {
    font-family:'Shadows Into Light Two', Arial;
    font-size: 20px;
    background-color: gray;
    text-align: center;
}

main {
    display: flex;
    flex-direction: column;
    color: darkblue;
    border: 2px solid gray;
    border-radius: 40px;
   
}

header {
    text-align: center;
    padding: 10px;
    color: black;
    background-color: dodgerblue;
    border-top-left-radius: 40px;
    border-top-right-radius: 40px;
}

.formatLabel {
    display: inline-block;
    width: 250px;
    text-align: right;
    vertical-align: text-top;
}

footer {
    background-color: black;
    padding: 1px;
    padding-left: 20px;
    color: lightgray;
    border-bottom-left-radius: 40px;
    border-bottom-right-radius: 40px;
}

#events_name_test {
    display: none;
}

div {
    height: 300px;
    color: dodgerblue;
    background-color: lightgray;
}

form {
    color: darkblue;
    background-color: dodgerblue;
    padding: 10px;
}

section {
    background-color: white;
}

</style>

</head>

<body>
    <main>
    <header>
        <h1>WDV341 Intro PHP</h1>
        <h3>Events Form</h3>
    </header>

    <?php
        if($dataProcessed) {
            //display confirmation message
    ?>

        <div>
            <p>Thank you for entering your event information. We look forward to your event!</p>
        </div>

        <?php
        }

        else{  //display the form so the user can input data and submit it for processing
        ?>
            <section>
            
                <h2>Event Signup</h2>
                <p>Please enter your event information in the form below.</p>
               
                <form id="event-form" name="event_form" method="post" action="eventsForm.php">
                    <p>
                        <label for="" class="formatLabel">Event Name:</label> 
                        <input type="text" name="events_name" id="events-name" />
                        <input type="text" name="events_name_fake" id="events_name_test" /> 
                    </p>
                    <p>
                        <label for="" class="formatLabel">Event Description:</label>
                        <input type="text" name="events_description" id="events-description" />
                    </p>
                    <p>
                        <label for="" class="formatLabel">Event Presenter:</label> 
                        <input type="text" name="events_presenter" id="events-presenter" />
                    </p>
                    <p>
                        <label for="" class="formatLabel">Event Date:</label> 
                        <input type="text" name="events_date" id="events-date" placeholder="mm-dd-YYYY" />
                    </p>
                    <p>
                        <label for="" class="formatLabel">Event Time:</label> 
                        <input type="text" name="events_time" id="events-time" />
                    </p>
                    <p>
                        <input type="submit" name="submit" id="button" value="Submit" />
                        <input type="reset" name="button2" id="button2" value="Clear Form" />
                    </p>
                </form>

            </section> 
        <?php
            }
        ?>
         <footer>
            <p>Copyright &copy 2022. Brian Stowell, DMACC Student.</p>
         </footer>
        </main>
    
</body>

</html>


