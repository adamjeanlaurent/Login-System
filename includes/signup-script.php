<?php 

require "dbh.php";

// makes sure that the user naviagted to this page via the signup form
if(isset($_POST['signup-submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    $email = $_POST['mail'];
    
    // Takes user back to signup page if any fields are empty with previously typed info and error message in URL
    if(empty($username) || empty($password) || empty($password_repeat) || empty($email)){
        header("Location: ../signup.php?error=emptyfields&username=".$username."&email=".$email);
        exit();
    }

    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invalid-username-and-email");
        exit();
    }
    // Takes user back to signup page if a invalid email was submitted with error message and username in URL
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidemail&username=".$username);
        exit();
    }
 // Takes user back to signup page if their username uses dissallowed characters with email and error message in URL
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invalidusername&&email=".$email);
        exit();
    }
// Takes user back to signup page if their passwords don't match with error message in URL
    else if($password !== $password_repeat){
        header("Location: ../signup.php?error=passwordsDontMatch&username=".$username."&email=".$email);
        exit();
    }

    else{
        $sql = "SELECT username FROM users WHERE username = :username";
        $stmt = $dbh->prepare($sql);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute(array(
            ":username" => $username));
        //sends the user back to the login page if their desired username already exists in the database
        if($stmt->fetch(PDO::FETCH_ASSOC)){
            header("Location: ../signup.php?error=userNameTaken&email=".$email);
            exit();
        }
        //inserts the user's data into the database and sends them to the login page
        else{
            $sql = "INSERT INTO users(email,username,password) VALUES(:email,:username,:password)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":email" => $email,
                ":username" => $username,
                ":password" => $hashedPassword 
            ));
            header("Location: ../index.php?signup=success");
            exit();
        }
    }
}
//sends the user back to the signup page if they didn't get to this script by using the form on the signup page
else{
    header("location: ../signup.php");
    exit();
}
