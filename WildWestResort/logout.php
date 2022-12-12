<?php
    session_start();
    //Logout of our application

    session_unset();    //unset/remove all session variables
    session_destroy();  

    //return to the web application home page  
    header('Location: adminLogin.php');
?>