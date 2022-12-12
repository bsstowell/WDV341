<?php
error_reporting(E_ALL ^ E_NOTICE);

$secretKey = "6LcrIFsjAAAAADki4Hn3NSZ-m_9fw1Mbol9FwsYf";
$responseKey = $_POST['g-recaptcha-response'];
$userIP = $_SERVER['REMOTE_ADDR'];

$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
$response = file_get_contents($url);
$response = json_decode($response);
//accept the form data and insert into the database
//send a confirmation page back to the customer
$dataProcessed = false;

if(isset($_POST["submit"]) && $response->success) {
    
    $guestName = $_POST["name"];
    $guestEmail = $_POST["email"];
    $arrivalDate = $_POST["arrival"];
    $departureDate = $_POST["departure"];
    $roomTheme = $_POST["theme"];

    $insertDate = date("Y-m-d");
    $updateDate = date("Y-m-d");

try {
require_once('dbConnectServer.php');

$arrivalDate = date('Y-m-d', strtotime($arrivalDate));
$departureDate = date('Y-m-d', strtotime($departureDate));

$sql = "INSERT INTO guest_reservations (guest_name, guest_email, arrival_date, departure_date, room_theme, date_inserted, date_updated)
    VALUES (:guestName, :guestEmail, :arrivalDate, :departureDate, :roomTheme, :dateInserted, :dateUpdated)";

    $stmt= $conn->prepare($sql);

    $stmt->bindParam(':guestName',$guestName);
    $stmt->bindParam(':guestEmail',$guestEmail);
    $stmt->bindParam(':arrivalDate',$arrivalDate);
    $stmt->bindParam(':departureDate',$departureDate);
    $stmt->bindParam(':roomTheme',$roomTheme);
    $stmt->bindParam(':dateInserted',$insertDate);
    $stmt->bindParam(':dateUpdated',$updateDate);

    $stmt->execute();

    $dataProcessed = true;
}

catch(PDOException $e) {
    echo "Problems inserting into the reservations table." . $e->getMessage();
}
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

                <?php
                    if($dataProcessed) {
                        //display confirmation message
                ?>

                <div class="flex-container-3" style="height:500px;width:80%;">
                    <p style="font-size:20px">
                       Thank you for your reservation! <br>Please click on the PayPal button 
                       below to submit your payment and complete the reservation process.
                       <br><br>We look forward to seeing you at Wild West Resort!  
                    </p>

                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" style="background-color: rgb(90,0,0);border:none;text-align:center">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="F47YTA5D8NUKJ">
                        <table>
                        <tr><td><input type="hidden" name="on0" value="Price/NIght">Price/Night</td></tr><tr><td><select name="os0">
                            <option value="1 Night">1 Night $327.00 USD</option>
                            <option value="2 Nights">2 Nights $595.00 USD</option>
                            <option value="3 Nights">3 Nights $799.00 USD</option>
                        </select> </td></tr>
                        </table>
                    <div>
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" width="170px" height="auto" text-align="center" align-items="center">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </div>
                    </form>

                </div> 

                <?php
                }

                else{  //display the form so the user can input data and submit it for processing
                ?>
                <div>
                <form id="reservation" name="reservation" method="post" action="insertForm.php">
                    <h2>Room Reservation</h2>
                    <p>Please enter your reservation information in the form below.</p>
                    <p>
                        <label for="" class="formatLabel">Name:</label> 
                        <input type="text" name="name" id="name" />
                        <input type="text" name="name_fake" id="name_test" /> 
                    </p>
                    <p>
                        <label for="" class="formatLabel">Email:</label>
                        <input type="text" name="email" id="email" />
                    </p>
                    <p>
                        <label for="" class="formatLabel">Arrival Date:</label> 
                        <input type="date" name="arrival" id="arrival" />
                    </p>
                    <p>
                        <label for="" class="formatLabel">Departure Date:</label> 
                        <input type="date" name="departure" id="departure" />
                    </p>
                    <p>
                            <label for="theme" class="formatLabel">Room Themes:</label>
                            <select id="theme" name="theme">
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
                        <div class="g-recaptcha" data-sitekey="6LcrIFsjAAAAAOX8aVqZqu1kA_InCfTZ4BsGH8GA" style="margin-left:auto;margin-right:auto"></div>

                    <p>
                        <input type="submit" name="submit" id="button" value="Submit" class="button"/>
                        <input type="reset" name="button2" id="button2" value="Clear Form" class="button"/>
                    </p>
                </form>
                <script src="https://www.google.com/recaptcha/api.js"></script>
                </div>
                 
                </header>

                <?php
                }
                ?>

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