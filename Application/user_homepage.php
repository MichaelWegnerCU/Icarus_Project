<?php
//index.php
session_start();

include 'connect.php';
include 'login_header.php';

 $server = '127.0.0.1';
 $username   = 'root';
 $password   = 'new_password';
 $dbname     = 'IcarusProject';

$conn = new mysqli($server, $username, $password, $dbname);

$sql = "SELECT BIO FROM users WHERE user_name= '".$_SESSION['user_name']. "' ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
mysqli_close($conn);


 echo'
      <div class="container">
           <div class="row">
                <div class="col-md-3">
                    <div class="container">
                          <img src="Pics/profilepics/default_profile_pic.png" class="img-rounded" alt="test" width="240" height="240">';
                          echo '<br></br>';
                          echo $_SESSION['user_name'] . "<br>";
                          echo $row["BIO"] . "<br>";
                          echo'
                          <a href="addbio.php">Update Bio</a>';
                          echo'
                    </div>
                </div>
                <div class="col-md-9">
                     <nav class="navbar navbar-expand-lg navbar-light bg-light">
                          <div id="navbarNav">
                            <ul class="navbar-nav">
                              <li class="nav-item active">
                                  <a class="nav-link" href="#">Courses</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">Questions Asked</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#"> Messages</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">To-Do List</a>
                              </li>
                            </ul>
                          </div>
                        </nav>';
						if ($row["Courses"]==1){
						echo '
                        <div>
                        <h4>Course 1</h4>
                        <h4>Course 2</h4>
                        <h4>Course 3</h4>
                        </div>
                        <div class="row">
                             <div class= "col-sm">
                             </div>
                             <div class= "col-sm">
                             </div>
                             <div class= "col-sm">
                             <a href="addclass.php">Add Class</a>
                             </div>
                        </div>';}
						echo '
                </div>
           </div>
      </div>
';
include 'footer.php';

?>