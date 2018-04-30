<?php
//connect.php
$server = '127.0.0.1';
$username   = 'root';
$password   = 'new_password';
$database   = 'IcarusProject';
global $conn;
$conn=mysqli_connect($server, $username, $password)or die("cannot connect server ");
// Check connection

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($conn,$database);

// ...some PHP code for database "test"...

mysqli_close($conn);

?>