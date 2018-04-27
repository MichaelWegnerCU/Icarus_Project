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
  $sql = "SELECT user_id, user_name FROM users WHERE user_name = '" . mysqli_real_escape_string($conn,$_POST['user_name']) . "'
                    AND user_pass = '" . mysqli_real_escape_string($conn,$_POST['user_pass']) . "'";
                         
            $result = mysqli_query($conn,$sql);
            if(!$result)
            {
                //something went wrong, display the error
                echo 'Something went wrong while signing in. Please try again later.';
                //echo mysqli_error($conn); //debugging purposes, uncomment when needed
            }
            else
            {
                //the query was successfully executed, there are 2 possibilities
                //1. the query returned data, the user can be signed in
                //2. the query returned an empty result set, the credentials were wrong
                if(mysqli_num_rows($result) == 0)
                {
                    echo 'You have supplied a wrong user/password combination. Please try again. <a href="index.php">Sign in.</a>';
                }
                else
                {
                    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;
                     
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $_SESSION['user_id']    = $row['user_id'];
                        $_SESSION['user_name']  = $row['user_name'];
                        $_SESSION['user_firstname']  = $row['user_firstname'];
                        $_SESSION['user_Bio'] = $row['BIO'];
                        $_SESSION['user_ProfilePic'] = $row['ProfilePic'];
                    }
                    echo "<script> window.location.assign('user_homepage.php'); </script>"; //Will load the user homepage upon login
                   
                }
            }

?>
