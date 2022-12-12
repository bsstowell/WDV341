<?php
session_start();

$validSignon = false;       //valid or invalid username/password
$displayError = false;      //if true then it will display an error message on the form

//if a validUser then skip everything until the view, HTML and show the Admin page

//Code solution
//if NOT a validUser then process the form as normal
error_reporting(E_ALL ^ E_NOTICE);

$secretKey = "6LcrIFsjAAAAADki4Hn3NSZ-m_9fw1Mbol9FwsYf";
$responseKey = $_POST['g-recaptcha-response'];
$userIP = $_SERVER['REMOTE_ADDR'];

$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
$response = file_get_contents($url);
$response = json_decode($response);

if( isset($_SESSION['validUser']) && $_SESSION['validUser'] == 'yes'){
    //you are a VALID user - show admin page
    $validSignon = true;  
    //retrieve the userName to display on the Admin form
    $inUsername = $_SESSION['inUsername'];      //get UserName from session and display on Admin page      
}
else{
    //INVALID user so show login form or process login form
    if(isset($_POST["submit"]) && $response->success){
        //form has been submitted - process the login information
        //echo "Form has been submitted.  Process the login";

        $inUsername = $_POST['username'];
        $inPassword = $_POST['password'];

        try{
            require_once('dbConnectServer.php');

            $sql = "SELECT admin_username, admin_password from wild_west_login ";
            $sql .= "WHERE admin_username = :acctUsername and admin_password = :acctPassword";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':acctUsername', $inUsername);
            $stmt->bindParam(':acctPassword', $inPassword);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);    //return an associate array from result set

            //if the select returns a record we know that the username/password is valid
            //if the returned record contains our username and password it is a valid user 
            //      give them access
            //      display the admin functions
            //if the select fails to return a record we know that the username/password is INVALID
            //      access denied
            //      display an error message "Invalid username/password".  Please try again

            $row = $stmt->fetch();

            if( isset($row['admin_username']) ){
                //Valid username/signon display the Admin Section
                $validSignon = true;                //this will show the Admin section
                $_SESSION['validUser'] = "yes";     //allow this user to see protected pages
                $_SESSION['inUsername'] = $inUsername;  //save for return to Admin page
                //echo "</p>" . $_SESSION['validUser'] . "</p>";
            }
            else{
                //echo "<div style='color:red'>Invalid username/password. Please try again.</div>";
                $displayError = true;      //flag switch usually boolean - display error message
            }
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
//else you are a VALID User and should see the Admin Page
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

    <style>
      
    </style>
   
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
    
              <header class="adminHeader">
                <h1 style="color:white">Wild West Resort</h1>

                <?php
        if($validSignon){
            //display the Admin Section
    ?>
            <div class="adminLogin"><!--Display this section after successful login - Administrative Page -->
                <h4>Administration Page
                <br><br>Welcome Back <?php echo $inUsername; ?>!
                <br><br>
                    <p id="button"><a href="addRecord.php">Add a Reservation to the Database</a></p><br>
                    <p id="button"><a href="reservationList.php">Display / Update / Delete Database Records</a></p><br>
                    <p id="button"><a href="logout.php">Log Off</a></p><br>
                </h4>
            </div>
    <?php
        }
        else{
            //display the login form
    ?>
        <section><!-- Login Form - display until successful login -->
       
            <form method="post" action="adminLogin.php">
                <h3>Administrative Login</h3>
                <?php
                if($displayError){
                ?>
                    <div style="color:red">Invalid username/password. Please try again.</div>
                <?php
                }
                ?>
                <p>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" placeholder="Username">
                    <input type="text" name="name_fake" id="name_test" /> 
                </p>
                <p>
                    <label for="password">Password:</label>
                    <input type="text" name="password" id="password" placeholder="Password">
                </p>
                <div class="g-recaptcha" data-sitekey="6LcrIFsjAAAAAOX8aVqZqu1kA_InCfTZ4BsGH8GA" style="margin-left:auto;margin-right:auto"></div>
                <p>
                    <input type="submit" name="submit" value="Sign In" style="margin-left:auto;margin-right:auto">
                    <input type="reset" style="margin-left:auto;margin-right:auto">
                </p>
            </form> 
            <script src="https://www.google.com/recaptcha/api.js"></script>
        </section>
    <?php
        }
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