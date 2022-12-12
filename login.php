<?php
session_start();

$validSignon = false;       //valid or invalid username/password
$displayError = false;      //if true then it will display an error message on the form

//if a validUser then skip everything until the view, HTML and show the Admin page

//Code solution
//if NOT a validUser then process the form as normal

if( isset($_SESSION['validUser']) && $_SESSION['validUser'] == 'yes'){
    //you are a VALID user - show admin page
    $validSignon = true;  
    //retrieve the userName to display on the Admin form
    $inUsername = $_SESSION['inUsername'];      //get UserName from session and display on Admin page      
}
else{
    //INVALID user so show login form or process login form
    if(isset($_POST["submit"])){
        //form has been submitted - process the login information
        //echo "Form has been submitted.  Process the login";

        $inUsername = $_POST['username'];
        $inPassword = $_POST['password'];

        try{
            require_once('dbConnect.php');

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>

    <?php
        if($validSignon){
            //display the Admin Section
    ?>
            <section><!--Display this section after successful login - Administrative Page -->
                <h2>Administration Page</h2>
                <h3>Welcome back <?php echo $inUsername; ?></h3>
                <ul>
                    <li>Add a reservation</li>
                    <li>Pull data from database</li>
                    <li><a href="logout.php">Log Off</a></li>
                </ul>
            </section>
    <?php
        }
        else{
            //display the login form
    ?>
        <section><!-- Login Form - display until successful login -->
            <form method="post" action="login.php">
                <h3>LOGIN FORM</h3>
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
                </p>
                <p>
                    <label for="password">Password:</label>
                    <input type="text" name="password" id="password" placeholder="Password">
                </p>
                <p>
                    <input type="submit" name="submit" value="Sign In">
                    <input type="reset">
                </p>
            </form> 
        </section>
    <?php
        }
    ?>
</body>
</html>
