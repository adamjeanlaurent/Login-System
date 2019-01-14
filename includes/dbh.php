<?php 
//establishes connection to the database
$dbh = new PDO('mysql:host=localhost;port=8889;dbname=My_Website', 'root', 'root');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);