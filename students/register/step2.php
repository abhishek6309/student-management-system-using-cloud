<?php

session_start();

if(isset($_SESSION['email']))
{
    require_once('../../include/dbcon.php');
    
    $contact= $enrollmentNumber = $rollno = $address = $city = $state = $zipcode = "";
    $contactError = $enrollmentNumberError = $rollnoError = $zipcodeError = "";
    $email = $_SESSION['email'];
if($_POST){
    if($_POST['contact']){
        if(strlen(trim($_POST["contact"])) != 10){
            $contactError = "Mobile Number must have 10 Characters.";
        } else{
        $tempContact = $_POST['contact'];
        $checkMobile = "SELECT `contact` FROM `students` WHERE `contact` = '$tempContact' ";
        $run= mysqli_query($con,$checkMobile);
          if(mysqli_num_rows($run) > 0 ) {
            $contactError = "Mobile Number is Already in Use!";
          } else {
                    $contact = $_POST['contact'];
                 }
            }    
    }
        if($_POST['enrollmentNumber']){
            $tempEnroll = $_POST['enrollmentNumber'];
            $checkenrollmentNumber = "SELECT `enrollmentNumber` FROM `students` WHERE `enrollmentNumber` = '$tempEnroll'";
            $run= mysqli_query($con,$checkenrollmentNumber);
            if ($run) {
                if(mysqli_num_rows($run) > 0) {
                    $enrollmentNumberError = "Enrollment Number is Already in Use!";
              } else{
                        $enrollmentNumber = $_POST['enrollmentNumber'];
                    }
                }    
            }  
            if($_POST['rollno']){
                $tempRoll = $_POST['rollno'];
                $checkrollno = "SELECT `rollno` FROM `students` WHERE `rollno` = '$tempRoll'";
                $run= mysqli_query($con,$checkrollno);
                if ($run) {
                    if(mysqli_num_rows($run) > 0) {
                        $rollnoError = "Roll Number is Already in Use!";
                  } else{
                            $rollno = $_POST['rollno'];
                        }
                    }    
                }  
                
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $gender = "";
            $gender = $_POST['gender'];
            
            if ( ! preg_match('/^\d+$/', $_POST['zipcode']) ) {
                $zipcodeError = "Only integers are allowed!";
              }else if(strlen(trim($_POST["zipcode"])) == 6){
                $zipcode = trim($_POST["zipcode"]);
            } else{
                $zipcodeError = "Zipcode must have only 6 Characters.";
            }
            
            if(empty($enrollmentNumberError) && empty($contactError) && empty($rollnoError) && empty($zipcodeError)){
                $sql = "UPDATE `students` SET `rollno`='$rollno',`enrollmentNumber`='$enrollmentNumber',`gender`='$gender',`contact`='$contact',`city`='$city',`address`='$address', `state` = '$state',`zipcode` = '$zipcode' WHERE `email`= '$email' ";
                $run= mysqli_query($con,$sql);
                if($run){
                    $sql = "UPDATE `students` SET `step`= '3' WHERE `email`= '$email' ";
                    $run= mysqli_query($con,$sql);
                    header("location:step3.php");    
                    } 
                } 
            }
}
else{
    header("location:/");
}
?>
<html>
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
                                <h5>Student Registeration Step II </h5>
                            </div>
                            <div class="row input-field">
                                <p class="col">
                                    Select Gender:
                                    </p>
                                <p class="col">
                                <label>
                                  <input name="gender" value="Male" type="radio" />
                                  <span>Male</span>
                                </label>
                                </p>
                                <p class="col">
                                <label>
                                  <input name="gender" value="Female" type="radio" />
                                  <span>Female</span>
                                </label>
                                </p>
                              </div>

                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="contact" id="contact" required="required" class="<?php echo (!empty($contactError)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact; ?>">
                                <span class="invalid-feedback"><?php echo $contactError; ?></span>
                                <label for="contact">Enter Mobile Number</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="enrollmentNumber" id="enrollmentNumber" required="required" class="<?php echo (!empty($enrollmentNumberError)) ? 'is-invalid' : ''; ?>" value="<?php echo $enrollmentNumber; ?>">
                                <span class="invalid-feedback"><?php echo $enrollmentNumberError; ?></span>
                                <label for="enrollmentNumber">Enter Enrollment Number</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="rollno" id="rollno" required="required" class="<?php echo (!empty($rollnoError)) ? 'is-invalid' : ''; ?>" value="<?php echo $rollno; ?>">
                                <span class="invalid-feedback"><?php echo $rollnoError; ?></span>
                                <label for="rollno">Enter Roll Number</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">add_location</i>
                                <input type="text" name="address" id="address" required="required">
                                <label for="address">Enter Address</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">add_location</i>
                                <input type="text" name="city" id="city" required="required">
                                <label for="city">Enter City</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">add_location</i>
                                <input type="text" name="state" id="state" required="required">
                                <label for="state">Enter State</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">add_location</i>
                                <input type="text" name="zipcode" id="zipcode" required="required" class="<?php echo (!empty($zipcodeError)) ? 'is-invalid' : ''; ?>" value="<?php echo $zipcode; ?>">
                                <span class="invalid-feedback"><?php echo $zipcodeError; ?></span>
                                <label for="zipcode">Enter Zipcode</label>
                            </div>

                            <div>
                            <button type="submit" class="btn" style="width: 100%; border-radius: 15px;">Next</button>
                        </div>
                        </div>
            </form>
        </div>
    </div>
  
                    
    <!--Import jQuery before materialize.js-->
<script type="text/javascript" src="../../js/materialize.min.js"></script>
</body>
</html>