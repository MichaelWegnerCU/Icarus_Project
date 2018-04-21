<?php
//addbio.php
session_start();

include 'connect.php';
include 'login_header.php';

$server = '127.0.0.1';
$username   = 'root';
$password   = 'new_password';
$dbname     = 'IcarusProject';

    echo '<form action="send_Bio.php" method="post">
        <textarea rows="4" cols="50" name="BIO" >
Enter text here...</textarea>
        <br></br>
        <input type="submit" value="Add Bio" />
     </form>';

?>

