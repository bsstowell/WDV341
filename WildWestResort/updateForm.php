<?php
 //error_reporting(E_ALL ^ E_NOTICE);

 session_start();
    if ($_SESSION['validUser'] !== "yes") {
        header('Location: adminLogin.php');
    }

    $successfulUpdate = false;

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
                        <input type="text" name="name" id="name"  value="<?php echo $row['guest_name']; ?>" />
                    </p>
                    <p>
                        <label for="" class="formatLabel">Email:</label>
                        <input type="text" name="email" id="email" value="<?php echo $row['guest_email']; ?>"/>
                    </p>
                    <p>
                        <label for="" class="formatLabel">Arrival Date:</label> 
                        <input type="text" name="arrival" id="arrival" value="<?php echo $row['arrival_date']; ?>" />
                    </p>
                    <p>
                        <label for="" class="formatLabel">Departure Date:</label> 
                        <input type="text" name="departure" id="departure" value="<?php echo $row['departure_date']; ?>" />
                    </p>
                    <p>
                            <label for="theme" class="formatLabel">Room Themes:</label>
                            <select id="theme" name="theme" value="<?php echo $row['room_theme']; ?>">
                                <option value="">Choose a Theme</option>
                                <option value="earp">Wyatt Earp</option>
                                <option value="oakley">Annie Oakley</option>
                                <option value="kid">Billy the Kid</option>
                                <option value="sac">Sacagawea</option>
                                <option value="james">Jesse James</option> 
                                <option value="jane">Calamity Jane</option>
                                <option value="bill">Buffalo Bill</option>
                                <option value="doc">Doc Holliday</option>
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