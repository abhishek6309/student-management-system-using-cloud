<?php
session_start();
//echo $_SESSION["email"];
if(isset($_SESSION["email"])){
    $mobileNumber= $enrollmentNumber = $rollNumber = $address = $city = $state = $gender = $zip = "";
    $mobileNumberError = $enrollmentNumberError = $rollNumberError = "";
    $email = $_SESSION["email"];
require_once "config.php";

if($_POST){
    $gender = $_POST['gender'];

    if($_POST['mobileNumber']){
            
            $checkmobileNumber = "SELECT `mobileNumber` FROM `student` WHERE `email` = '$email' ";
            $run= mysqli_query($mysqli,$checkmobileNumber);
            $row = mysqli_num_rows($run);
            if($row){
                $mobileNumber = $_POST['mobileNumber'];
            }
            else{
                $mobileNumberError= "Mobile Number Already in Use!";
            }   
        }
        if($_POST['enrollmentNumber']){
            
            $checkenrollmentNumber = "SELECT `enrollmentNumber` FROM `student` WHERE `email` = '$email' ";
            $run= mysqli_query($mysqli,$checkenrollmentNumber);
            $row = mysqli_num_rows($run);
            if($row){
                $enrollmentNumber = $_POST['enrollmentNumber'];
            }
            else{
                $enrollmentNumberError= "Enrollment Number Already in Use!";
            }   
        }
        
        if($_POST['rollNumber']){
            
            $checkrollNumber = "SELECT `rollNumber` FROM `student` WHERE `email` = '$email' ";
            $run= mysqli_query($mysqli,$checkrollNumber);
            $row = mysqli_num_rows($run);
            if($row){
                $rollNumber = $_POST['rollNumber'];
            }
            else{
                $rollNumberError= "Roll Number Already in Use!";
            }   
        }

        $address = $_POST['address'];
        $city = $_POST['city'];
        $state= $_POST['state'];
        $zip = $_POST['zip'];
    $studentPersonal = "INSERT INTO `student`(`gender`,`mobileNumber`, `enrollmentNumber`, `rollNumber`, `address`,`city`,`state`,`zip`) VALUES ('$gender','$mobileNumber','$enrollmentNumber','$rollNumber','$address','$city','$state','$zip')";
    $run= mysqli_query($mysqli,$studentPersonal);
    $row = mysqli_num_rows($run);
          if($row < 1){
               session_start();
               $_SESSION["enrollmentNumber"] = $enrollmentNumber;
               header("LOCATION:studentEducational.php");
             }
             else{
                 echo "Something Went Wrong!";
            }
    }
}
else{
    header("LOCATION:/new/");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome @MIT</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="" width="auto" height="100px" class="d-inline-block align-text-top">
            </a>
            <div class="d-flex justify-content-end">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="/new/">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Student Login</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Teacher Login</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                
            </div>   
        </div>        
    </nav>

    <div class="d-flex justify-content-center" id="studentForm">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
                <label for="gender">Select Gender:</label>
                <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male">
                <label class="form-check-label" for="gridRadios1">Male</label>
            </div>
            <div class="form-group">
                <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
                <label class="form-check-label" for="gridRadios2">Female</label>
            </div>
            <div class="form-group">
                <label for="mobileNumber">Mobile Number</label>
                <input type="text" name="mobileNumber" class="form-control <?php echo (!empty($mobileNumberError)) ? 'is-invalid' : ''; ?>">             
                <span class="invalid-feedback"><?php echo $mobileNumberError; ?></span>
            </div>    
            <div class="form-group">
                <label for="enrollmentNumber">Enrollment Number</label>
                <input type="text" name="enrollmentNumber" class="form-control <?php echo (!empty($enrollmentNumberError)) ? 'is-invalid' : ''; ?>">             
                <span class="invalid-feedback"><?php echo $enrollmentNumberError; ?></span>
            </div>
            <div class="form-group">
                <label for="rollNumber">Roll Number</label>
                <input type="text" name="rollNumber" class="form-control <?php echo (!empty($rollNumberError)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $rollNumberError; ?></span>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="inputAddress"  class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="inputAddress">
                </div>
                <div class="col">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" name="city" class="form-control" id="inputCity">
                </div>
            </div>    
            <div class="form-group row">
            <div class="col">
                    <label for="inputZip" class="form-label">Zip Code</label>
                    <input type="text" name="zip" class="form-control" id="inputCity">
                </div>
                <div class="col">
                    <label for="inputState" class="form-label">State</label>
                    <input type="text" name="state" class="form-control" id="inputCity">
                </div>            
            </div>
            <div class="form-group d-flex justify-content-center" id="form-buttons">
                <input type="submit" class="btn btn-primary" value="Next"> &nbsp;
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
