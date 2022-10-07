<?php
session_start();
require_once "config.php";
$email = $password = $confirm_password = $emailError =  $password_err = $confirm_password_err = "";
$mobileNumber= $enrollmentNumber = $rollNumber = $address = $city = $state = "";
    $mobileNumberError = $enrollmentNumberError = $rollNumberError = "";
if($_POST){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    if($_POST['email']){
            $tempEmail = $_POST['email'];
            $checkEmail = "SELECT `email` FROM `student` WHERE `email` = '$tempEmail' ";
            $run= mysqli_query($mysqli,$checkEmail);
            $row = mysqli_num_rows($run);
            if($row < 1){
                $email = $_POST['email'];
            }
            else{
                $emailError = "Email Already in Use!";
            }   
        }
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST["password"])) < 8){
            $password_err = "Password must have atleast 8 Characters.";
        } else{
            $password = trim($_POST["password"]);
        }
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm password.";     
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Passwords do not match.";
            }
        }
    $date = date("Y-m-d H:i:s");    
    if(empty($emailError) && empty($password_err) && empty($confirm_password_err)){
    $studentSQL = "INSERT INTO `student`(`firstName`, `lastName`, `email`, `password`,`dateCreated`) VALUES ('$firstName','$lastName','$email','$password','$date')";
    $run= mysqli_query($mysqli,$studentSQL);
    //$row = mysqli_num_rows($run);
            if(run){
                $_SESSION["email"] = $email;
                header("LOCATION:/new/studentPersonal.php");
            }
            else{
                echo "Something went wrong";
            }
        }        
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
                          <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                <label>First Name</label>
                <input type="text" name="firstName" class="form-control" required>
            </div>    
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastName" class="form-control" required>
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($emailError)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" required>
                <span class="invalid-feedback"><?php echo $emailError; ?></span>
            </div>            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" required>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err
                )) ? 'is-invalid' : ''; ?>" required>
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group d-flex justify-content-center" id="form-buttons">
                <input type="submit" class="btn btn-primary" value="Next"> &nbsp;
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
