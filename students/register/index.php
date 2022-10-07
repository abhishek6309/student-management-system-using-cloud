<?php
    session_start();

    $name = $email = $password = $emailError = $password_err = $confirm_password_err = $confirm_password = "";
    require_once('../../include/dbcon.php');

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        if($_POST['email']){
        $tempMail = $_POST['email'];
        $checkEmail = "SELECT `email` FROM `students` WHERE `email` = '$tempMail' ";
        $run= mysqli_query($con,$checkEmail);
        if ($run) {
          if (mysqli_num_rows($run) > 0) {
            $emailError = "Email is Already in Use!";
          } else {
            $email = $_POST['email'];
          }
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

        if(empty($emailError) && empty($password_err) && empty($confirm_password_err)){
            $query = "INSERT INTO `students` (`name`,`email`,`password`) VALUES('$name','$email','$password')";
            $run = mysqli_query($con,$query);
            //$row = mysqli_num_rows($run);
            if($run){
                $query = "INSERT INTO `students` (`step`) VALUES('2') WHERE `email` = '$email' ";
                $run = mysqli_query($con,$query);
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                header("location:/students/register/step2.php");
            }
        }
    
}
?>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body style="background-image:url(../../../images/sms_bg.jpg); background-size: cover;">
  <nav class="brown darken-4">
    <div class="container">
        <a class="brand-logo hide-on-med-and-down" href="/">MIT ADT University</a>
    <ul class="right">
        <li class="waves-effect waves-light"><a href="/">Student Login</a></li>
    </ul>
</div>
</nav>
    <div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                            <div class="card-content">
                                <h5 class="" >Student Registeration</h5>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    person
                                </i>
                                <input type="text" name="name" id="name" required="required">             
                                <label for="name">Enter Full Name</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    person
                                </i>
                                <input type="email" name="email" id="email" required="required" class="form-control <?php echo (!empty($emailError)) ? 'is-invalid' : ''; ?>">             
                                <span class="invalid-feedback"><?php echo $emailError; ?></span>
                                <label for="email">Enter Email Address</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    lock
                                </i>                    
                                <input type="password" name="password"  id="password" required="required" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">             
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                <label for="password">Enter Password</label>
                            </div>
                            <div class="">

                            <div class="input-field">
                                <i class="material-icons prefix">
                                    lock
                                </i>                    
                                <input type="password" name="confirm_password"  id="confirm_password" required="required" class="form-control <?php echo (!empty($confirm_password)) ? 'is-invalid' : ''; ?>">             
                                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                <label for="password">Confirm Password</label>
                            </div>
                            <div class="">
                            
                        </div>
                        <br>
                            <div>
                            <button type="submit" name="submit" class="btn" style="width: 100%; border-radius: 15px;">Register</button>
                        </div><br>Already Have an Account? <a href="/">Login Here</a>.
                        </div>
            </form>
        </div>
    </div>
  
                    
    <!--Import jQuery before materialize.js-->
<script type="text/javascript" src="../../js/materialize.min.js"></script>
</body>
</html>