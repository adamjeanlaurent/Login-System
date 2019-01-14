<?php  
require "dbh.php";
//makes sure the user got to this script by presing the button on the form
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //checks for empty fields
    if(empty($username) || empty($password)){
        header("Location: ../index.php?emptyfields&username=".$username);
        exit();
    }
    //runs SQL query
    else{
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":username" => $username
        ));
        //sends user back to login page if no user is found with the given username
        if(!$stmt->fetch(PDO::FETCH_ASSOC)){
            header("Location: ../index.php?&error=userNotFound");
            exit();
        }
        //Compares given password and password for the account with the user given username
        else{
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
            ":username" => $username
            ));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $pwdCheck = password_verify($password,$row['password']);
            if($pwdCheck == false){
                header("Location: ../index.php?error=invaildPassword");
                exit();
            }
            else if($pwdCheck == true){
                session_start();
                $_SESSION['userId'] = $row['user_id'];
                $_SESSION[username] = $row['username']; 
                header("Location: ../index.php?login=success");
            }
        }

    }

}
//Sends the user back to the login page if they got to this script without pressing the button on the form
else{
    header("Location: ../index.php");
    exit();
}