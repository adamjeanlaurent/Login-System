<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/login-styles.css" />
</head>
<body>
<?php 
    //displays the logout button if the user is logged in
    if(isset($_SESSION['userId'])){
        echo'<form action="includes/logout-script.php" class = "list">
        <button name = "logout" class="logoutbtn">Logout</button>
        </form>';
    }
    else{
        //displays the login form in the user is logged out
        echo '<div class = "form-container">
    
        <h2>Login Or Signup</h2>
        <form action="includes/login-script.php"method="post" class = "list">
        <label for="username">Username:</label>
        <input type="text" id="username" name = "username"> <br>
        <label for="password">Password:</label> 
        <input type="password" id="password" name ="password">
        <button class = "loginbtn" name ="login">Log In</button>
        </form>
    
        <form action="signup.php">
        <button class = "signupbtn">Signup</button> 
        </form>    
    </div>';
    }
    
    ?>


</body>
</html>