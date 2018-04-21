<?php
//send_bio.php
session_start();

include 'connect.php';
include 'login_header.php';

$server = '127.0.0.1';
$username   = 'root';
$password   = 'new_password';
$dbname     = 'IcarusProject';
 

$conn = new mysqli($server, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Connecting to sql db.
//Sending form data to sql db.
$sql= "UPDATE users SET BIO='" . mysqli_real_escape_string($conn,$_POST['BIO']) . "' WHERE user_name= '".$_SESSION['user_name']. "' ";

$result = mysqli_query($conn,$sql);
        
if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            echo mysqli_error($conn); //debugging purposes, uncomment when needed
        }
else
        {
            echo 'Successfully updated Bio. <a href="user_homepage.php">Return to Homepage</a>';
        }

?>