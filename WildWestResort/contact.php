<?php
  error_reporting(E_ALL ^ E_NOTICE);

  $secretKey = "6LcrIFsjAAAAADki4Hn3NSZ-m_9fw1Mbol9FwsYf";
  $responseKey = $_POST['g-recaptcha-response'];
  $userIP = $_SERVER['REMOTE_ADDR'];

  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
  $response = file_get_contents($url);
  $response = json_decode($response);

  $name = $_POST['name'];
  $fakeName = $_POST['name_test']; //honeypot
  $email = $_POST['email'];
  $theme = $_POST['theme'];
  $comments = $_POST['comments'];
  $date = date('m-d-Y');

  $email_from = 'contact@brianstowell.name';
  $email_subject = "New Form Submission";
  $email_body = "You have received a new message from the user $name at $email.\n
                  Here is the message regarding $theme:\n $comments";
  
  $email_to = "$email";
  $email_to_subject = "Thank you for contacting Wild West Resort";
  $email_to_body = "
                <html>
                <body style=\"background-color:darkgray;font-size:15px;font-weight:bold;\">
                <h3 style=\"font-size:25px;background-color:darkred;color:darkgray;padding:10px;margin-bottom:20px;text-align:center;\">Wild West Resort</h3>
                <p style=\"margin-left:15px\">$date</p>
                <p style=\"margin-left:15px\">Thank you $name, for contacting us regarding $theme.</p>
                <p style=\"margin-left:15px\">We received your comments: </p>
                <p style=\"margin-left:15px\">$comments</p>
                <p style=\"margin-left:15px\">We look forward to responding to your inquiry and will do so within 3 business days.</p>

                <p style=\"margin-left:15px\">Thanks again for contacting us. Have a great day!</p>

                <h3 style=\"font-size:15px;background-color:rgb(173, 159, 29);padding:10px;margin-bottom:20px;text-align:center;\"><a href='https://brianstowell.name/WDV341/WildWestResort/index.php' style=\"color:darkred;text-decoration:none;\">Click Here to Return to Wild West Resort</a></h3>
                </body>
                </html>";
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
    
              <header style="background-image: url(images/seamless_paper.webp);padding-bottom:15px">
                <h1>Wild West Resort</h1>

                    <?php
                     if(isset($_POST["submit"]) && $response->success && $fakeName == "") {
                      ?>
                        <div style="text-align:center;">
                          <p><?php echo date("m-d-Y"); ?></p>
                          <p>Hello <?php echo $name;?>,</p>
                          <p>Thank you for your interest in Wild West Resort.</p>
                          <p>We will be in contact with you shortly at your email address, <?php echo $email; ?>.</p>
                          <p>We hope to see you soon at Wild West Resort!</p>
                        </div>
                      

                    <?php

                          $to = "briansstowell@hotmail.com";
                          $headers = "From: $email_from \r\n";
                          $headers .= "Reply-To: $email \r\n";
                          $headers .= "MIME-Version: 1.0 \r\n";
                          $headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";

                          mail($to,$email_subject,$email_body,$headers);

                          mail($email_to,$email_to_subject,$email_to_body,$headers);
                     }
                     else{
                    ?>
                      <div style="padding-bottom:20px">
                  
                      <form id="contact" name="contact" method="post" action="contact.php" style="background-color: rgb(115, 86, 61);color:white;">
                        <h2>Contact Us</h2>
                        <p>
                            <label for="" class="formatLabel">Name:</label> 
                            <input type="text" name="name" id="name" required />
                            <input type="text" name="name_test" id="name_test" /> 
                        </p>
                        <p>
                            <label for="" class="formatLabel">Email:</label>
                            <input type="text" name="email" id="email" required />
                        </p>
                            <p>
                                <label for="theme" class="formatLabel">Reason for Contact:</label>
                                <select id="theme" name="theme" required>
                                    <option value="">Choose a Reason</option>
                                    <option value="rates">Room Rates</option>
                                    <option value="room themes">Room Themes</option>
                                    <option value="general inquiry">General Inquiry</option>
                                    <option value="attractions">Local Attractions</option>
                                </select>
                            </p>
                            <p>
                                <label for="" class="formatLabel">Message:</label>
                                <textarea name="comments" id="comments" rows="5" cols="55" required></textarea>
                            </p>
                            <p>
                            <div class="g-recaptcha" data-sitekey="6LcrIFsjAAAAAOX8aVqZqu1kA_InCfTZ4BsGH8GA" style="margin-left:auto;margin-right:auto"></div>
                            </p>

                        <p>
                            <input type="submit" name="submit" id="button" value="Submit" class="button"/>
                            <input type="reset" name="button2" id="button2" value="Clear Form" class="button"/>
                        </p>
                    </form>
                    <script src="https://www.google.com/recaptcha/api.js"></script>
                    </div> 
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