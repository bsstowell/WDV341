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
    
              <header>
                <h1>Wild West Resort</h1>

              <div class="flex-container-2">
			
                <div>
                  <figure class="clearFix">
                    <img src="images/room4.webp" width="350" height="300">                    
                    </figure>
                </div>
                
                <div>
                  <figure class="clearFix">
                    <img src="images/exteriorMotel.webp" width="350" height="300">                    
                    </figure>
                </div>

                <div>
                  <figure class="clearFix">
                    <img src="images/roomView.webp" width="350" height="300">                    
                    </figure>
                </div>
                
              </div>

              </header>

              <section>
                    <div>
                        <h2>About Us</h2>
                        <p>Wild West Resort was founded in 1972 as an idea formed by two friends over a few drinks. Teddy Brunswick
                            and Larry West worked as bartenders at a local establishment when they came up with idea to start their
                            own business. Their shared love for Wild West movies and stories of the great outlaws turned into their
                            dream of the Wild West Resort. Now, many years later, the Wild West Resort is still going strong and offering
                            a one-of-a-kind experience for travelers in Cody, Wyoming. 
                        </p>
                    </div>
                
              </section>

              <div class="flex-container-2">
			
                <div>
                  <figure class="clearFix">
                    <img src="images/buffalo.jpg" width="300" height="350">                    
                    <figcaption>Buffalo Bill</figcaption>
                    </figure>
                </div>
                
                <div>
                  <figure class="clearFix">
                    <img src="images/oakley.jpg" width="300" height="350">                    
                    <figcaption>Annie Oakley</figcaption>
                    </figure>
                </div>

                <div>
                  <figure class="clearFix">
                    <img src="images/earp.jpg" width="300" height="350">                    
                    <figcaption>Wyatt Earp</figcaption>
                    </figure>
                </div>
                
              </div>
  
    <footer>

      <div>
        <p>1942 Buffalo Bill Street<br>
        Cody, Wyoming 82414<br>
        307-527-1234<br>
        WildWestResort@resort.com</p>
      </div>

      <div>
        <a href="https://www.facebook.com"><img src="images/facebook.png" height=50px width=50px alt="facebook" class="flex-gap"></a>
        <a href="https://www.instagram.com"><img src="images/instagram.png" height=50px width=50px alt="instagram"></a>
        <a href="https://twitter.com"><img src="images/twitter.png" height=50px width=50px alt="twitter" class="flex-gap"></a>
      </div>

      <div>
      Copyright &copy <?php echo date("Y"); ?>. Wild West Resort.
      </div>
    
    </footer>

</div> <!-- end of main container-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>