<?php

require_once "config.php";
 

$first = $last = $email = $enrollment = $mobile = $roll = $password = $confirm_password = "";
$first_err = $last_err = $email_err = $enrollment_err = $mobile_errl = $roll_err = $password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    if(empty(trim($_POST["first"]))){
        $first_err = "Please enter your First Name.";
    } else{
        
        $sql = "SELECT id FROM users WHERE first = ?";
        
        if($stmt = $mysqli->prepare($sql)){
          
            $stmt->bind_param("s", $param_first);
            
        
            $param_first = trim($_POST["first"]);
            
     
            if($stmt->execute()){
          
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $first_err = "Oops! Something went wrong. Please try again later.";
                } else{
                    $first = trim($_POST["first"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

   
            $stmt->close();
        }
    }

    if(empty(trim($_POST["last"]))){
        $last_err = "Please enter your Last Name.";
    } else{
      
        $sql = "SELECT id FROM users WHERE last = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            
            $stmt->bind_param("s", $param_last);
            
         
            $param_last = trim($_POST["last"]);
            
            if($stmt->execute()){
               
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $last_err = "Oops! Something went wrong. Please try again later.";
                } else{
                    $last = trim($_POST["last"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            $stmt->close();
        }
    }
    
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your E-mail.";
    } else{
        
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            
            $stmt->bind_param("s", $param_email);
            
            
            $param_email = trim($_POST["email"]);
            
            
            if($stmt->execute()){
               
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $email_err = "This email is already in use.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            $stmt->close();
        }
    }
  
    if(empty(trim($_POST["enrollment"]))){
        $email_err = "Please enter your Enrollment Number.";
    } else{
     
        $sql = "SELECT id FROM users WHERE enrollment = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            
            $stmt->bind_param("s", $param_enrollment);
            
           
            $param_email = trim($_POST["enrollment"]);
            
            
            if($stmt->execute()){
            
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $enrollment_err = "This Enrollment Number is already in use.";
                } else{
                    $enrollment = trim($_POST["enrollment"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            $stmt->close();
        }
    }
   
    if(empty(trim($_POST["mobile"]))){
        $email_err = "Please enter your Mobile Number..";
    } else{
       
        $sql = "SELECT id FROM users WHERE mobile = ?";
        
        if($stmt = $mysqli->prepare($sql)){
           
            $stmt->bind_param("s", $param_mobile);
            
            
            $param_mobile = trim($_POST["mobile"]);
            
            
            if($stmt->execute()){
           
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $mobile_err = "This mobile Number is already in use.";
                } else{
                    $mobile = trim($_POST["mobile"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

  
            $stmt->close();
        }
    }
    
    if(empty(trim($_POST["roll"]))){
        $roll_err = "Please enter your E-mail.";
    } else{
   
        $sql = "SELECT id FROM users WHERE roll = ?";
        
        if($stmt = $mysqli->prepare($sql)){
           
            $stmt->bind_param("s", $param_roll);
            
          
            $param_roll = trim($_POST["roll"]);
            
           
            if($stmt->execute()){

                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $roll_err = "This Roll Number is already in use.";
                } else{
                    $roll = trim($_POST["roll"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

          
            $stmt->close();
        }
    }
   
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    
    if(empty($first_err) && empty($last_err) && empty($email_err) && empty($enrollment_err) && empty($roll_err) && empty($mobile_err) && empty($password_err) && empty($confirm_password_err)){
        
        
        $sql = "INSERT INTO personal (first, last, email, enrollment, roll, phone, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
         
            $stmt->bind_param("sssssss", $param_first, $param_last, $param_email, $param_enrollment, $param_roll, $param_mobile, $param_password);
            
           
            $param_first = $first;
            $param_last = $last;
            $param_email = $email;
            $param_enrollment = $enrollment;
            $param_roll = $roll;
            $param_mobile = $mobile;
            

            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
           
            if($stmt->execute()){
              
                header("location: login.php");
            } else{
                echo "Error: " . $sql . "<br>" . $mysqli->error;
                echo "Oops! Something went wrong. Please try again later.";
            }

      
            $stmt->close();
        }
    }
    
   
    $mysqli->close();
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register@MIT</title>
  </head>
  <body>
    <div class="d-flex justify-content-center">
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <img src="https://raw.githubusercontent.com/niranjan-exe/MIT-ADT-Quiz-Site/main/mit-logo.png" class="logo">
          <h1 id="form-heading"> Register </h1>
            <div class="mb-3">
                <label for="first" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first" placeholder="Jon" required>
                <span class="invalid-feedback"><?php echo $first_err; ?></span>
            </div>

            <div class="mb-3">
                <label for="last" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last" placeholder="Doe" required>
                <span class="invalid-feedback"><?php echo $last_err; ?></span>
            </div>

            <div class="mb-3">
                <label for="e-mail" class="form-label">E-mail</label>
                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>

            <div class="mb-3">
                <label for="enrollment" class="form-label">Enrollment Number</label>
                <input type="text" class="form-control" name="enrollment" placeholder="MITUXXXXXXXXXX" required>
                <span class="invalid-feedback"><?php echo $enrollment_err; ?></span>
            </div>

            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" name="mobile" placeholder="9890XXXXXX" min="10" max="10" required>
                <span class="invalid-feedback"><?php echo $mobile_err; ?></span>
            </div>

            <div class="mb-3">
                <label for="roll" class="form-label">Roll Number</label>
                <input type="text" class="form-control" name="roll" placeholder="22XXXXX" required>
                <span class="invalid-feedback"><?php echo $roll_err; ?></span>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>     
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" required>
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>

            <div class="col-auto" id="form-buttons">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>

                <button type="reset" class="btn btn-danger mb-3" >Reset</button>
            </div>          
        </form> 
    </div>
  </body>
</html>
