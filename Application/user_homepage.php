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
 echo'
      <div class="container">
           <div class="row">
                <div class="col-md-3">
                    <div class="container">
                          <img src="ProfilePics/default_profile_pic.png" class="img-rounded" alt="test" width="240" height="240">';
                          echo '<p></p>';
                          echo 'Welcome, ' . $_SESSION['user_name'];
                          echo' '. $_SESSION['user_Bio'];
                          echo'
                          <a href="addbio.php">Add BIO</a>
                          <p>Bio could go here.</p>             
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
                        </nav>
                        <div >
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
                        </div>
                </div>
           </div>
      </div>
';

?>