<?php
 session_start();
    if ($_SESSION['validUser'] !== "yes") {
        header('Location: adminLogin.php');
    }

    $successfulUpdate = false; 

    if(isset($_POST['submit'])){


        //echo "form been submitted.";
        $guestId = $_GET['guestId'];
        $guestName = $_POST['guest_name'];
        $guestEmail = $_POST['guest_email'];
        $arrivalDate = $_POST['arrival_date'];
        $departureDate = $_POST['departure_date'];
        $roomTheme = $_POST['room_theme'];

        try {
            require_once('dbConnectServer.php');
    
            $sql = "UPDATE guest_reservations
                    SET guest_name = :guestName,
                        guest_email = :guestEmail,
                        arrival_date = :arrivalDate,
                        departure_date = :departureDate,
                        room_theme = :roomTheme
                    WHERE guest_id = :guestId";
    
            $stmt = $conn->prepare($sql);
    
            $stmt->bindParam(':guestId',$guestId);
            $stmt->bindParam(':guestName',$guestName); 
            $stmt->bindParam(':guestEmail',$guestEmail);
            $stmt->bindParam(':arrivalDate',$arrivalDate);
            $stmt->bindParam(':departureDate',$departureDate);
            $stmt->bindParam(':roomTheme',$roomTheme);
    
            $stmt->execute();  
            
            $successfulUpdate = true; 
        }
        catch(PDOException $e) {
            echo "Problems updating the record back to the database." . $e->getMessage();
        }
    }
    else{

        $guestId = $_GET['guestId'];
        echo "update guestid $guestId";

        try {
            require_once('dbConnectServer.php');
    
            $sql = "SELECT  guest_id, 
                            guest_name, 
                            guest_email, 
                            arrival_date,
                            departure_date,
                            room_theme
                    FROM guest_reservations 
                    WHERE guest_id = :guestId";
    
            $stmt = $conn->prepare($sql);
    
            $stmt->bindParam(':guestId',$guestId);
    
            $stmt->execute();         
        }
        catch(PDOException $e) {
            echo "Problems getting the record from the database." . $e->getMessage();
        }

        $row = $stmt->fetch();
    }
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

               <?php
                if($successfulUpdate) {
                    ?>
                        
                   <div class="flex-container" style="height:500px;width:70%;background-color: lightgray">
                    <p style="font-size:25px;text-align:center">
                       The guest reservation was updated successfully. Thank you.</p>
                    <button id="button"><a href="adminLogin.php">Back to Admin</a></button>
                    </div> 
                  
                <?php
                }
                 else { 
                ?>

                <form id="reservation" name="reservation" method="post" action="updateForm.php?guestId=<?php echo $row['guest_id']; ?>" style="background-color:black;color:white">
                    <h2>Room Reservation Update Form</h2>
                    <p>
                        <label for="" class="formatLabel">Name:</label> 
                        <input type="text" name="guest_name" id="guest_name" value="<?php echo $row['guest_name']; ?>" />
                    </p>
                    <p>
                        <label for="" class="formatLabel">Email:</label>
                        <input type="text" name="guest_email" id="guest_email" value="<?php echo $row['guest_email']; ?>"/>
                    </p>
                    <p>
                        <label for="" class="formatLabel">Arrival Date:</label> 
                        <input type="date" name="arrival_date" id="arrival_date" value="<?php echo $row['arrival_date']; ?>" />
                    </p>
                    <p>
                        <label for="" class="formatLabel">Departure Date:</label> 
                        <input type="date" name="departure_date" id="departure_date" value="<?php echo $row['departure_date']; ?>" />
                    </p>
                    <p>
                            <label for="theme" class="formatLabel">Room Themes:</label>
                            <select id="room_theme" name="room_theme" >
                                <option value="">Choose a Theme</option>
                                <option value="earp" <?php if($row['room_theme'] == 'earp') echo "selected"; ?> >Wyatt Earp</option>
                                <option value="oakley" <?php if($row['room_theme'] == 'oakley') echo "selected"; ?> >Annie Oakley</option>
                                <option value="kid" <?php if($row['room_theme'] == 'kid') echo "selected"; ?> >Billy the Kid</option>
                                <option value="sac" <?php if($row['room_theme'] == 'sac') echo "selected"; ?> >Sacagawea</option>
                                <option value="james" <?php if($row['room_theme'] == 'james') echo "selected"; ?> >Jesse James</option>  
                                <option value="jane" <?php if($row['room_theme'] == 'jane') echo "selected"; ?> >Calamity Jane</option>
                                <option value="bill" <?php if($row['room_theme'] == 'bill') echo "selected"; ?> >Buffalo Bill</option>
                                <option value="doc" <?php if($row['room_theme'] == 'doc') echo "selected"; ?> >Doc Holliday</option>
                            </select>
                        </p>
                    <p>
                        <input type="submit" name="submit" id="button" value="Update" class="button"/>
                        <input type="reset" name="button2" id="button2" value="Clear Form" class="button"/>
                    </p>
                </form>

                <?php
                    }  //else branch for form has not been submitted
                ?>

                </header>
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
