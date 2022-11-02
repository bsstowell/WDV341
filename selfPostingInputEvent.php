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
    
    
        require_once('dbConnect.php');

        $eventsDate = date('m-d-Y', strtotime($eventsDate));
        //$eventsTime = date('H:i', strtotime($eventsTime));

        $sql = "INSERT INTO wdv341_events (events_name, events_description, events_presenter, events_date, events_time)
        VALUES (:eventsName, :eventsDescription, :eventsPresenter, :eventsDate, :eventsTime)";

        $stmt= $conn->prepare($sql);

        $stmt->bindParam(':eventsName',$eventsName);
        $stmt->bindParam(':eventsDescription',$eventsDescription);
        $stmt->bindParam(':eventsPresenter',$eventsPresenter);
        $stmt->bindParam(':eventsDate',$eventsDate);
        $stmt->bindParam(':eventsTime',$eventsTime);

        $stmt->execute();

        $dataProcessed = true;  //act as a flag or switch to use later
    
    }//form needs processed

         //display the form to the user so they can enter their information and hit submit
?>
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV 341 Intro PHP - Self Posting Input Event Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}h1,h2,h3{font-weight:400}h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}h1 span{color:#484c9b}h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}h3{font-size:18px;line-height:35px;margin:50px 0 0}a{color:#484c9b;text-decoration:none}a:focus,a:hover{text-decoration:underline}p{margin:0 0 2rem}p span{color:#aaa}header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}header p{margin:0}section{width:95%;max-width:910px;margin:40px auto}pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}thead{background:#5965af;color:#fff}tbody tr td,thead td{padding:.5rem .75rem}tbody tr:nth-child(even){background:#efefef}tbody tr td:first-child{padding-left:1.25rem}tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}tbody tr td:last-child,thead td:last-child{width:50%}@media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}
    </style>
</head>

<body>
    <header>
        <h1>WDV341 Intro PHP</h1>
        <h3>Self Posting Input Event Form</h3>
    </header>

    <?php
        if($dataProcessed) {
            //display confirmation message
    ?>

        <section>
            <p>Thank you for entering your event information. We look forward to your event!</p>
        </section>

        <?php
        }

        else{  //display the form so the user can input data and submit it for processing
        ?>
            <section>
            
                <h2>Event Signup</h2>
                <p>Please enter your event information in the form below.</p>
               
                <form id="event-form" name="event_form" method="post" action="selfPostingInputEvent.php">
                    <p>
                        <label for="">Event Name:</label> 
                        <input type="text" name="events_name" id="events-name" />
                    </p>
                    <p>
                        <label for="">Event Description:</label>
                        <input type="text" name="events_description" id="events-description" />
                    </p>
                    <p>
                        <label for="">Event Presenter:</label> 
                        <input type="text" name="events_presenter" id="events-presenter" />
                    </p>
                    <p>
                        <label for="">Event Date:</label> 
                        <input type="text" name="events_date" id="events-date" value="<?php echo date('m-d-Y'); ?>" />
                    </p>
                    <p>
                        <label for="">Event Time:</label> 
                        <input type="text" name="events_time" id="events-time" value="<?php echo date('H:i'); ?>" />
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
        
    
</body>

</html>


