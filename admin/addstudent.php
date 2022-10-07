<?php
require_once('../include/header.php');
?>

<?php

    require_once('../include/dbcon.php');

    if(isset($_POST['submit'])){
    $image_name = $_FILES['image']['name'];
    $temp_image_name =  $_FILES['image']['tmp_name'];
    $rollno = $_POST['rollno'];
    $course = $_POST['course'];
    $name= $_POST['name'];
    $gender= $_POST['gender'];
    $contact = $_POST['contact'];
    $email =  $_POST['email'];
    $year = $_POST['year'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    move_uploaded_file($temp_image_name,"img/$image_name");
   $query = "INSERT INTO `students`(`rollno`, `course`, `year`,`name`, `gender`, `contact`, `email`,`password`, `city`,`image`) VALUES ('$rollno','$course','$year','$name','$gender','$contact','$email','$password','$city','$image_name')";
    $run = mysqli_query($con,$query);
    
    if($run)
    {
        $_SESSION['student_added'] = "Student Added Successfully";
        $student_added =  $_SESSION['student_added'];
    }
    else{

      $_SESSION['student_added_failed'] = "Failed To Add New Student";
      $student_added_failed =  $_SESSION['student_added_failed'];
     }
}
?>
      <!-- The Coding Has Been Started From Here -->

      <nav class="teal">
        <div class="container">
          <div class="nav-wrapper">
            <a href="" class="brand-logo center">MIT ADT University</a>
            <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
          </div>        
        </div>
      </nav>


      <!-- The Dashboard Coding Started From Here -->

        <div class="row main">
            <div class="col l12 m12 s12">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-panel">
                <div class="cente">
                <h5 class="center red-text"><?php 
              
              if(isset($student_added)){
                echo $student_added; 
              }
              

            ?> </h5></div>
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                     <div class="input-field file-field">
                     <input type="file" name="image" class="dropify" data-show-remove="false" data-default-file="../images/user.png" />
                     </div>
                      </div>
                        <div class="col l4">
                            <div class="input-field">
                                    <i class="material-icons prefix">assignment_ind</i>
                                <input type="text" name="rollno" id="rollno" required="required">
                                <label for="rollnow">Enter Roll Number</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                    <input type="text" name="name" id="name" required="required">
                                    <label for="name">Enter Full Name</label>
                                </div>
                                <div class="input-field">
                                  <i class="material-icons prefix">person</i>
                                  <select name="gender" required="required">
                                              <option value="">Select Gender</option>
                                              <option value="Male">Male</option>
                                              <option value="Female">Female</option>
                                        </select>
                                  </div>

                                <div class="input-field">
                                        <i class="material-icons prefix">call</i>
                                        <input type="text" name="contact" id="contact" required="required">
                                        <label for="contact">Enter Mobile Number</label>
                                    </div>
                                    <div class="input-field">
                                      <i class="material-icons prefix">assignment_ind</i>
                                      <input type="text" name="enrollment" required="required">
                                      <label for="enrollment">Enter Enrollment Number</label>
                                  </div>
                                    <!-- -->
                                    
                                    <!-- -->
                        </div>
                        <div class="row">
                            <div class="col l4">
                                <div class="input-field">
                                  <i class="material-icons prefix">library_books</i>
                                <select name="course" required="required">
                                            <option value="">Choose Course</option>
                                            <option value="B.Tech">B.Tech</option>
                                            <option value="M.Tech">M.Tech</option>
                                            <option value="Biotechnology">Biotechnology</option>
                                            <option value="Design">Design</option>
                                      </select>
                                </div>
                                <div class="input-field">
                                  <i class="material-icons prefix">date_range</i>
                                  <select name="year" required="required">
                                              <option value="">Choose Year</option>
                                              <option value="FY">FY</option>
                                              <option value="SY">SY</option>
                                              <option value="TY">TY</option>
                                              <option value="Final Year">Final Year</option>
                                        </select>
                                  </div>

                                <div class="input-field">
                                        <i class="material-icons prefix">location_city</i>
                                        <input type="text" name="city" id="city" required="required">
                                        <label for="city">Enter City Name</label>
                                    </div>
                                    <div class="input-field">
                                      <i class="material-icons prefix">email</i>
                                      <input type="text" name="email" id="email" required="required">
                                      <label for="email">Enter Email Address</label>
                                  </div>
                                  <div class="input-field">
                                    <i class="material-icons prefix">password</i>
                                    <input type="password" name="password" id="password" required="required">
                                    <label for="password">Enter Password</label>
                                </div>

                                  

                            </div>
                        </div>
                        
                        
                    </div>
                     
                    <button type="submit" name="submit" style="width:100%" class="btn">Add Student</button>
                </div>
              </form>

            </div>
        </div>

      <!-- The Navbar Menu Collection List -->

      <?php
require_once('../include/sidenav.php');
?>


      <?php
require_once('../include/footer.php');
?>