<?php
    //PHP Connection file - connects a PHP application page to the MySQL database
    $host = "localhost";        //most servers default to localhost
    $database = "bsstowell15_wdv341";       //target database to connect with        
    $username = "bsstowell15_wdv341";             //username for the MySQL database within XAMPP
    $password = "Riggins#18";      

try {
  $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} 

catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>