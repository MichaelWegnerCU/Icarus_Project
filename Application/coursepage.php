<?php
//signup.php
include 'connect.php';
include 'header.php';
 
echo '
<h3>Course List</h3>';


$server = '127.0.0.1';
 $username   = 'root';
 $password   = 'new_password';
 $dbname     = 'IcarusProject';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql = "SELECT * FROM class";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()){

    	echo "". $row["ClassCode"] . "" . $row["ClassNumber"] . " " . $row["ClassName"]. " Description: ". $row["ClassDescription"]. "<br>";
    	echo "<button type = "button"> Add class </button>";
} 
}

else {
    echo "0 results";
}
$conn->close();


?>