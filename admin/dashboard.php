<?php
require_once('../include/dbcon.php');
require_once('../include/header.php');

?>

<?php

// Fetching The Number Of Students

$query = "SELECT * FROM students";
$run = mysqli_query($con,$query);
$student_row = mysqli_num_rows($run);

// Fetching The Number Of Courses

$query = "SELECT * FROM course";
$run = mysqli_query($con,$query);
$course_row = mysqli_num_rows($run);

// Fetching The Number Of Teachers

$query = "SELECT * FROM teacher";
$run = mysqli_query($con,$query);
$teacher_row = mysqli_num_rows($run);

?>
    

      <nav class="teal">
        <div class="container">
          <div class="nav-wrapper">
            <a href="" class="brand-logo center">MIT ADT University</a>
            <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
          </div>        
        </div>
      </nav>




      <div class="row main">
        <div class="col m12 s12 l3">
          <div class="card">
            <div class="card-content blue lighten-3 white-text">
              <h3> <b><?php echo $student_row; ?></b> </h3>
              <p> <b>Students</b> </p>
            </div>
            <div class=" center card-action blue lighten-2 white-text" >
           <a href="allstudents.php">View Details <i class="material-icons tiny" >open_in_new</i></a>
            </div>
          </div>
        </div>
        <div class="col m12 s12 l3">
            <div class="card">
              <div class="card-content blue lighten-3 white-text">
              <h3> <b><?php echo $teacher_row; ?></b> </h3>
                <p> <b>Teachers</b> </p>
                  
              </div>
              <div class=" center card-action blue lighten-2 white-text" >
             <a href="teachers.php">View Details <i class="material-icons tiny">open_in_new</i></a>
              </div>
            </div>
          </div>
          <div class="col m12 s12 l3">
              <div class="card">
                <div class="card-content blue lighten-3 white-text">
                  <h3> <b><?php echo $course_row; ?></b> </h3>
                  <p> <b>Courses</b> </p>
                </div>
                <div class=" center card-action blue lighten-2 white-text" >
               <a href="course.php">View Details <i class="material-icons tiny">open_in_new</i></a>
                </div>
              </div>
            </div>
      </div>
      <div class="row main">
          <div class="col">
            <form action="/student_info.php" method="POST">
            <div class="card-panel">
              <div class="row">
                
              <div class="col">
                <div class="input-field">
                  <input type="text" name="rollno" id="rollno">
                  <label for="rollno">Enter Student Roll Number</label>
                </div>
              </div>
              <div class="col">
                  <div class="">
                      <button class="btn" name="search">View Information</button>
                  </div>
                </div>
            </div>
          </div>
        </form>
        </div>
      </div>
            
      
      <?php
require_once('../include/sidenav.php');
?>

      <?php
require_once('../include/footer.php');
?>