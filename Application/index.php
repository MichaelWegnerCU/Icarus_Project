<?php
//index.php
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
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo'
	<div class="container">
		<div class= "row">
				<div class= "col-sm" style="padding-top: 75px;padding-left: 75px;"">
					<h1>Welcome to Icarus</h1>
				</div>
				<div class= "col-sm">
					<img src="Pics/logo/icarus.png" alt="Icarus Logo" width="308" height="191">
				</div>

		</div>
	</div>
    <div class="container">
        <div class="row">
            <div class="col-sm" id="welcome_statement">
                <p> Icarus allows students and teachers to connect live during lectures and provides students with better resource to aid in the learning process. Icarus also gives teachers tools to easily meausure student progress and analyze participation.</p>

            </div>
            <div class="col-sm" id="who_are_you" >
                <h3> Are you a student or a teacher?</h3>
                <p></p>
                <div id="st_select" style="padding-left: 100px;">
                    <a href="signup_student.php">Student</a>
                    <a href="signup_teacher.php">Teacher</a>
                </div>
                
            </div>
        </div>
    </div>
	
    
    ';
    
     
     
}
else
{
    /* so, the form has been posted, we'll process the data in three steps:
        1.  Check the data
        2.  Let the user refill the wrong fields (if necessary)
        3.  Save the data 
    */
    $errors = array(); /* declare the array for later use */
     
    if(isset($_POST['user_name']))
    {
        //the user name exists
        if(!ctype_alnum($_POST['user_name']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['user_name']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }
     
     
    if(isset($_POST['user_pass']))
    {
        if($_POST['user_pass'] != $_POST['user_pass_check'])
        {
            $errors[] = 'The two passwords did not match.';
        }
    }
    else
    {
        $errors[] = 'The password field cannot be empty.';
    }
     
    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
    {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
        {
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul>';
    }
    else
    {
        // This will be the student table insert. ->

        $sql = "INSERT INTO users(user_name, user_pass, user_email ,user_date, user_ST)
                VALUES('" . mysqli_real_escape_string($conn,$_POST['user_name']) . "',
                       '" . mysqli_real_escape_string($conn,$_POST['user_pass']) . "',
                       '" . mysqli_real_escape_string($conn,$_POST['user_email']) . "',
                        NOW(),
                        's'
                        )";
                   
        
        $result = mysqli_query($conn,$sql);
        
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            echo mysqli_error($conn); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-)';
        }
    }
}
 
include 'footer.php';
?>
