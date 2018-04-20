<?php
//addbio.php
session_start();
include 'connect.php';
include 'header.php';

$server = '127.0.0.1';
 $username   = 'root';
 $password   = 'new_password';
 $dbname     = 'IcarusProject';

$conn = new mysqli($server, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo '<textarea rows="4" cols="50" name="BIO" form="usrform" method="post">
Enter BIO here...</textarea>';

$sql = "UPDATE users SET BIO=''" . mysqli_real_escape_string($conn,$_POST['BIO']) . "'' WHERE user_name= ' ".$_SESSION['user_name']. " '";
        
$result = mysqli_query($conn,$sql);

?>