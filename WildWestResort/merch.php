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
    
              <header>
                <h1>Wild West Resort</h1>
                <h2>Merchandise Store</h2>

              <div class="flex-container-2" style="background-color:lightgray;margin-top:auto;">
			              <div class="centerButton">
				            <figure class="figure">
					          <img src="images/book2.jpg" height="200" width="200" class="center codyMap">
					          <caption style="font-size:15px"><br>Purchase a keepsake digital book to remember
                                your visit to Wild West Resort for years to come!
                                Inside you will find historical information about
                                the Wild West icons which our resort is based.
                    </caption>
                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" style="background-color: rgb(173, 159, 29);border:none;text-align:center">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="QACDCDERJC8AW">
                                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
                      </figure>
                    </div>
          
			            <div class="centerButton">
				              <figure class="figure">
					              <img src="images/old-west-shirt.jpg" height="200" width="200" class="center codyMap">
					              <caption><br>Don't go home without this high quality Wild West t-shirt. 
                                Made of 70/30 cotton-poly blend, this shirt is stylish and comfortable.
                            </caption>
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" style="background-color: rgb(173, 159, 29);border:none;text-align:center">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="RN6JXCWF56WCU">
                                <table style="background-color: rgb(173, 159, 29)">
                                <tr><td><input type="hidden" name="on0" value="Shirt Size">Shirt Size</td></tr><tr><td><select name="os0">
                                    <option value="Small">Small </option>
                                    <option value="Medium">Medium </option>
                                    <option value="Large">Large </option>
                                    <option value="X-Large">X-Large </option>
                                    <option value="XXL">XXL </option>
                                </select> </td></tr>
                                </table>
                                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>
                        </figure>
                      </div>

			          <div class="centerButton">
				        <figure class="figure">
					        <img src="images/long_sleeve.jpg" height="200" width="200" class="center codyMap">
					        <caption style="color:white"><br>This long-sleeve Cody, Wyoming shirt will sell fast! One of 
                                our biggest sellers each year, grab one while they're still available and 
                                let everyone know about your time at the Wild West Resort!
                            </caption>
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" style="background-color: rgb(173, 159, 29);border:none;text-align:center">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="NEEMH7TX36RWG">
                                <table style="background-color: rgb(173, 159, 29)">
                                <tr><td><input type="hidden" name="on0" value="Shirt Size">Shirt Size</td></tr><tr><td><select name="os0">
                                    <option value="Small">Small </option>
                                    <option value="Medium">Medium </option>
                                    <option value="Large">Large </option>
                                    <option value="X-large">X-large </option>
                                    <option value="2XL">2XL </option>
                                    <option value="3XL">3XL </option>
                                </select> </td></tr>
                                </table>
                                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>
                        </figure>
                    </div>
                    </div><!--end of first gray div-->
                    </header>
                    
                    <div class="flex-container-2" style="background-color:lightgray">
			                  <div class="centerButton">
				                        <figure class="figure">
                                <img src="images/mug.jpg" width="100" height="200" class="center codyMap">                         
					                      <caption style="color:white"><br>Grab this insulated mug to remember
                            your stay at Wild West Resort each time you take your favorite drink to
                            go! Keeps liquids hot or cold for hours. 
                            </caption>
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" style="background-color: rgb(173, 159, 29);border:none;text-align:center">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="L35LQKJAE7PBA">
                                <table style="background-color: rgb(173, 159, 29)">
                                <tr><td><input type="hidden" name="on0" value="Mug Color">Mug Color</td></tr><tr><td><select name="os0">
                                    <option value="Black">Black </option>
                                    <option value="Aqua">Aqua </option>
                                    <option value="Pink">Pink </option>
                                </select> </td></tr>
                                </table>
                                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>

                            </figure>
                        </div>  
                    
                  
			            <div class="centerButton">
				                  <figure class="figure">
                                <img src="images/mug2.jpg" width="100" height="200" class="center codyMap">                         
					                <caption style="color:white"><br>Grab this insulated mug to remember
                            your stay at Wild West Resort each time you take your favorite drink to
                            go! Keeps liquids hot or cold for hours. 
                            </caption>
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" style="background-color: rgb(173, 159, 29);border:none;text-align:center">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="L35LQKJAE7PBA">
                                <table style="background-color: rgb(173, 159, 29)">
                                <tr><td><input type="hidden" name="on0" value="Mug Color">Mug Color</td></tr><tr><td><select name="os0">
                                    <option value="Black">Black </option>
                                    <option value="Aqua">Aqua </option>
                                    <option value="Pink">Pink </option>
                                </select> </td></tr>
                                </table>
                                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>

                            </figure>
                           
                    </div>
                    
			            <div class="centerButton">
				                      <figure class="figure">
                                <img src="images/mug3.jpg" width="100" height="200" class="center codyMap">                         
					                  <caption style="color:white"><br>Grab this insulated mug to remember
                            your stay at Wild West Resort each time you take your favorite drink to
                            go! Keeps liquids hot or cold for hours. 
                            </caption>
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" style="background-color: rgb(173, 159, 29);border:none;text-align:center">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="L35LQKJAE7PBA">
                                <table style="background-color: rgb(173, 159, 29)">
                                <tr><td><input type="hidden" name="on0" value="Mug Color">Mug Color</td></tr><tr><td><select name="os0">
                                    <option value="Black">Black </option>
                                    <option value="Aqua">Aqua </option>
                                    <option value="Pink">Pink </option>
                                </select> </td></tr>
                                </table>
                                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>

                            </figure>
                      </div>
                            
                    </div><!--end of flex-container gray-->
                    
			    
            
  
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

</div> <!-- end of div id container-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>