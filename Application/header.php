<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Icarus</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
	<style>
	body {font-family: Arial, Helvetica, sans-serif;}

	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}
	

	/* Modal Content */
	.modal-content {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
	}

	/* The Close Button */
	.close {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}
	</style>
</head>
 
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div id="navbar1" >
		 <ul class="navbar-nav">
			 	<img src="Pics/logo/icarusFeather.png" alt="Icarus Logo" width="75" height="50">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="contact_us.html">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sudo link 2</a>
                </li>
                <li class="nav-item">  <!-- This is the sign in pop up --> 
                     <!-- <a class="nav-link" href="signin.php">Sign In</a> -->
					   <!--<div data-role="main" class="ui-content">
						   <a href="#myPopup" data-rel="popup" class="nav-link">Sign In</a>
						   <!--<a class="nav-link" href="signin.php"  data-rel="popup">Sign In</a>

							<div data-role="popup" id="myPopup" class="ui-content" style="min-width:250px;">
							  <form method="post" action="signin.php">
								<div>
								  <h3>Login information</h3>
								  <label for="usrnm" class="ui-hidden-accessible">Username:</label>
								  <input type="text" name="user_name" id="usrnm" placeholder="Username">
								  <label for="pswd" class="ui-hidden-accessible">Password:</label>
								  <input type="password" name="user_pass" id="pswd" placeholder="Password">
								  <input type="submit" data-inline="true" value="Log in">
								</div>
							  </form>
							</div>
						  </div> -->
					<!-- Trigger/Open The Modal -->
					<a class="nav-link" id="SignInBtn">Sign In</a>
					<!-- The Modal -->
					<div id="SignInModal" class="modal">

					  <!-- Modal content -->
					  <div class="modal-content">
						 <span class="close" style="padding-left:85%; "> &times;</span>
						 <form method="post" action="signin.php">
								<div>
								  <h3 style="color: maroon">Login information</h3><br>
								  <label for="usrnm" class="ui-hidden-accessible" style="color: maroon">Username:</label>
								  <input type="text" name="user_name" id="usrnm" placeholder="Username">
								  <label for="pswd" class="ui-hidden-accessible" style="color: maroon">Password:</label>
								  <input type="password" name="user_pass" id="pswd" placeholder="Password">
								  <input type="submit" data-inline="true" value="Log in">
								  <br>
								</div>
					    </form>
						<br>
						<br>
						<p style="color: maroon">New user? Sign up!</p>
						<h5 style="color: maroon"> Are you a student or a teacher?</h5>
                		<p></p>
                		<div id="st_select">
                    			<a href="signup_student.php"><button>Student</button></a>
                    			<a href="signup_teacher.php"><button>Teacher</button></a>
                		</div>
						
					  </div>

					</div>
                </li>
            </ul>
		  </div>
	</nav>
	<script>
		// Get the modal
		var modal = document.getElementById('SignInModal');

		// Get the button that opens the modal
		var btn = document.getElementById("SignInBtn");
		
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
			modal.style.display = "block";
		}
		
	

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
			
		}
		
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
				
			}
		}
	</script>

<div id="content">
	
