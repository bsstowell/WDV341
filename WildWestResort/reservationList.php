<?php
    session_start();
    if ($_SESSION['validUser'] !== "yes") {
        header('Location: adminLogin.php');
    }

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
    require 'dbConnectServer.php';

    $sql = "SELECT guest_id, guest_name, guest_email, arrival_date, departure_date, room_theme FROM guest_reservations ORDER BY guest_name";

    $stmt = $conn->prepare($sql);       //prepare your statement

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="descriptions" content="Wild West Resort">
	<meta name="keywords" content="travel, outdoors, vacation, motel, history, wild west">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and Website Application Components Final Project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link href="styles.css" rel="stylesheet" type="text/css">

    <style>

        .eventName {
            font-size: 20px;
            font-weight: bold;
        }

        table, th, td {
            border: thin solid white;
            padding: 10px;
        }

    </style>

</head>

<body>
    
<div id="container">

<nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="index.php">Home</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="roomThemes.php">Room Themes</a></li>
                          <li><a class="dropdown-item" href="about.php">About Us</a></li>
                          <li><a class="dropdown-item" href="merch.php">Merchandise</a></li>
                          <li><a class="dropdown-item" href="contact.php">Contact Us</a></li>
                        </ul>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="insertForm.php">Reserve a Room</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="adminLogin.php">Admin Login</a>
                        </li>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
    
              <header style="background-image: url('images/wood-background.jpg'); padding-bottom: 20px">
                <h1 style="color:white">Wild West Resort</h1>
                <h2 style="color:white">Administrative Area</h2>
              </header>
    
                    <div style="background-color: black;color:white">
                        <table>
                            <?php
                                while ($row = $stmt->fetch() ) {
                                    $guestId = $row['guest_id'];  //save guest_id into a PHP variable
                                    echo "<tr>";
                                    echo "<td>Guest Name: ";
                                    echo $row['guest_name'];
                                    echo "</td>";
                                    echo "<td>Email: ";
                                    echo $row['guest_email'];
                                    echo "</td>";
                                    echo "<td>Arrival Date: ";
                                    $date=date_create( $row['arrival_date'] );
                                    echo date_format($date, "l, n/d/Y");
                                    echo "</td>";
                                    echo "<td>Departure Date: ";
                                    $date=date_create( $row['departure_date'] );
                                    echo date_format($date, "l, n/d/Y");
                                    echo "</td>";
                                    echo "</td>";
                                    echo "<td>Room Theme: ";
                                    echo $row['room_theme'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<button id='button'><a href='updateForm.php?guestId=$guestId'>Update</a></button>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<button id='button'><a href='reservationDelete.php?guestId=$guestId'>Delete</a></button>";
                                    echo "</td>";
                                    echo "</tr>" ;
                                    echo "\n\r";
                                }
                        ?>
                        </table>
                    </div>
    <footer>

        <div>
            <p>1942 Buffalo Bill Street<br>
            Cody, Wyoming 82414<br>
            307-527-1234<br>
            WildWestResort@resort.com</p>
        </div>

        <div>
            <a href="https://www.facebook.com"><img src="images/facebook.png" height= 50px width= 50px alt="facebook" class="flex-gap"></a>
            <a href="https://www.instagram.com"><img src="images/instagram.png" height= 50px width= 50px alt="instagram" class="flex-gap"></a>
            <a href="https://twitter.com"><img src="images/twitter.png" height= 50px width= 50px alt="twitter" class="flex-gap"></a>
        </div>

        <div>
        Copyright &copy <?php echo date("Y"); ?>. Wild West Resort.
        </div>

    </footer>

</div> <!-- end of main container-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>