<?php
//index.php
session_start();

include 'connect.php';
include 'login_header.php';

// Aidan Edit: Since we have the stylesheet referenced in the header, I believe the following lines are redundant. 
//  $server = '127.0.0.1';
//  $username   = 'root';
//  $password   = 'new_password';
//  $dbname     = 'IcarusProject';

// $conn = new mysqli($server, $username, $password, $dbname);

$sql = "SELECT BIO FROM users WHERE user_name= '".$_SESSION['user_name']. "' ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$_SESSION["BIO"]=$row["BIO"];
mysqli_close($conn);


include 'user_homepage.html';
 

include 'footer.php';

?>