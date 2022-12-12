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
      @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap');
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

                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="images/wagons.webp" class="d-block w-100" height="450" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="images/exteriorMotel.webp" class="d-block w-100" height="450" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="images/pool.webp" class="d-block w-100" height="450" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </header>

              <section class="flex-container">
                   <p style="width:90%;text-align:left">Welcome to Wild West Resort! Each of our theme rooms include a King bed, jacuzzi bathroom with shower, and a pullout couch. 
                    Our hotel resort offers suite rooms only, each with a mini bar, microwave, and small refrigerator. </p>
              </section>

              <section class="flex-container">
                    <div style="max-width:100%;overflow:hidden;color:red;width:980px;height:400px;"><div id="embedded-map-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Cody,+WY,+USA&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="embed-map-html" href="https://kbj9qpmy.com/hrn" id="enable-map-data">hostingrightnow.com</a><style>#embedded-map-display img.text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div>
              </section>    
         
              <section class="flex-container">
                  <p style="width:90%;text-align:left">The surrounding area allows for plenty of daytime adventures including hiking, museums, swimming, and local restaurants
                      and bars.</p> 
                  <p style="width:90%;text-align:center">Come to Cody, Wyoming: the Gateway to the Wild West! </p>
                   </section>
                   <section class="flex-container">
                   <img src="images/map.jpg" width="500px" style="max-width:100%;overflow:auto;" class="codyMap">   
                    </section>
  
    <footer>

      <div>
        <p>1942 Buffalo Bill Street<br>
        Cody, Wyoming 82414<br>
        307-527-1234<br>
        WildWestResortWyoming@gmail.com</p>
      </div>

      <div>
        <a href="https://www.facebook.com"><img src="images/facebook.png" height= 50px width= 50px alt="facebook" class="flex-gap"></a>
        <a href="https://www.instagram.com"><img src="images/instagram.png" height= 50px width= 50px alt="instagram" class="flex-gap"></a>
        <a href="https://twitter.com"><img src="images/twitter.png" height= 50px width= 50px alt="twitter" class="flex-gap"></a>
      </div>

      <div>
      Copyright &copy <?php echo date("Y"); ?> Wild West Resort.
      </div>
    
    </footer>

</div> <!-- end of main container-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>