<?php 
//ends and destroys the session variables to logout the user
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");