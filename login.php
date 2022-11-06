<?php

if(isset($_POST["submit"])) {
    echo "form has been submitted.";

    $username = $_POST['username'];
    $password = $_POST['password'];

    try{

    require_once('database/dbConnect.php');

    $sql = "SELECT event_user_name, event_user_password FROM wdv341_event_user WHERE event_user_name = :username AND event_user_password = :password";
    
    $stmt->prepare($sql);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h3>Login form</h3>

    <form method="post" action="login.php">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Username">
        </p>
        <p>
            <label for="password">Username:</label>
            <input type="text" name="password" id="password" placeholder="Password">

        </p>

        <p>
        <input type="submit" name="submit" id="button" value="Submit" />
        <input type="reset" name="button2" id="button2" value="reset" />
        </p>
    </form>
    
</body>
</html>