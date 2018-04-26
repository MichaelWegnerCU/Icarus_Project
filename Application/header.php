<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Icarus</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
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
                    <a class="nav-link" href="#">Sudo link 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sudo link 2</a>
                </li>
                <li class="nav-item">  <!-- This is the sign in pop up --> 
                     <!-- <a class="nav-link" href="signin.php">Sign In</a> -->
					   <!--<div data-role="main" class="ui-content">-->
						   <a href="#myPopup" data-rel="popup" class="nav-link">Sign In</a>
						   <!--<a class="nav-link" href="signin.php"  data-rel="popup">Sign In</a>-->

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
						  <!--</div> -->
                </li>
            </ul>
		  </div>
	</nav>

<div id="content">
