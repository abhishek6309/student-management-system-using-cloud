<?php

session_start();

if(isset($_SESSION['email']))
{
    require_once('../../include/dbcon.php');

    
    
    if(isset($_POST['submit'])){
    $dob = "";
    $dob = $_POST['dob'];
    $course = "";
    $course = $_POST['course'];
    $year = "";
    $year = $_POST['year'];
    $specialization = "";
    $specialization = $_POST['specialization'];



    $email = $_SESSION['email'];
    $sql = "UPDATE `students` SET `dob`='$dob',`course`='$course',`year`='$year', `specialization` = '$specialization' WHERE `email` = '$email'  ";
    $run= mysqli_query($con,$sql);
    if($run){
        $sql = "UPDATE `students` SET `step`= '4' WHERE `email`= '$email' ";
        $run= mysqli_query($con,$sql);
        header("location:step4.php");
        }    
    }

}
?>
<html>
    <body>
    <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/../../css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body style="background-image:url(../../images/sms_bg.jpg); background-size: cover;">
  <nav class="brown darken-4">
    <div class="container">
        <a class="brand-logo hide-on-med-and-down" href="/">MIT ADT University</a>
    <ul class="right">
        <li>  Not <?php echo $_SESSION['email']; ?> </li>
        <li class="waves-effect waves-light"><a href="/include/logout.php">Logout</a></li>
    </ul>
</div>
</nav>

<div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                            <div class="card-content">
                                <h5>Student Registeration Step III </h5>
                            </div>
                            
                            <div class="input-field">
                                <i class="material-icons prefix">date_range </i>
                                <input type="date" name="dob" id="dob" required="required" class="datetime">
                                <label for="contact" style="padding-top: 15px;font-size: medium; ">Enter Date Of Birth</label>
                            </div>

                            <div class="input-field row" >
                                <div class="col s1">
                                    <i class="material-icons prefix">date_range </i>
                                </div>
                                <div class="col">
                                    <select class="browser-default" name="course" required>
                                        <option selected disabled>Choose Course</option>
                                         <option name="course" value="B. Tech">B. Tech</option>
                                         <option name="course" value="M. Tech">M. Tech</option>
                                         <option name="course" value="Design">Design</option>
                                         <option name="course" value="Food Technology">Food Technology</option>
                                         <option name="course" value="Manet">Manet</option>
                                    </select>
                                </div>
                                <div class="col ">
                                    <select class="browser-default" name="year" required>
                                        <option selected disabled>Choose Year</option>
                                        <option name="year" value="First Year">First Year</option>
                                        <option name="year" value="Second Year">Second Year</option>
                                        <option name="year" value="Third Year">Third Year</option>
                                        <option name="year" value="Final Year">Final Year</option>
                                    </select>
                                </div>
                                </div>
                                <div class="input-field row" >
                                    <div class="col s1">
                                        <i class="material-icons prefix">date_range </i>
                                    </div>
                                    <div class="col s6">
                                        <select class="browser-default col" name="specialization" required>
                                            <option selected disabled>Choose Specialization(For SY, TY and Final Year)</option>
                                            <option name="specialization" value="Core">Core</option>
                                            <option name="specialization" value="Intelligent System">Intelligent System</option>
                                            <option name="specialization" value="Network Security">Network Security</option>
                                        </select>
                                    </div>
                                </div>
                                
                              

                            <div>
                            <button type="submit" name="submit" class="btn" style="width: 100%; border-radius: 15px;">Next</button>
                        </div>
                        </div>
            </form>
        </div>
    </div>
  
    <!--Import jQuery before materialize.js-->
<script type="text/javascript" src="../../js/materialize.min.js"></script>
    </body>
</html>