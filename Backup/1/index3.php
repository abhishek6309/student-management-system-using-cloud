<?php

require_once "config.php";
 

$first = $last = $email = $mobile = $enroll = $roll = $password = $confirm_password = "";
$first_err = $last_err = $email_err = $mobile_err = $enroll_errl = $roll_err = $password_err = $confirm_password_err = "";
 

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
                
                $first = trim($_POST["first"]);
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
               
                    $last = trim($_POST["last"]);
       
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
  
    if(empty(trim($_POST["mobile"]))){
        $email_err = "Please enter your Mobile Number.";
    } else{
     
        $sql = "SELECT id FROM users WHERE mobile = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            
            $stmt->bind_param("s", $param_mobile);
            
           
            $param_email = trim($_POST["mobile"]);
            
            
            if($stmt->execute()){
            
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $mobile_err = "This Mobile Number is already in use.";
                } else{
                    $mobile = trim($_POST["mobile"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            $stmt->close();
        }
    }
   
    if(empty(trim($_POST["enroll"]))){
        $email_err = "Please enter your EnrollMent Number..";
    } else{
       
        $sql = "SELECT id FROM users WHERE enroll = ?";
        
        if($stmt = $mysqli->prepare($sql)){
           
            $stmt->bind_param("s", $param_enroll);
            
            
            $param_enroll = trim($_POST["enroll"]);
            
            
            if($stmt->execute()){
           
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $enroll_err = "This Enrollment Number is already in use.";
                } else{
                    $enroll = trim($_POST["enroll"]);
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
    
    
    if(empty($first_err) && empty($last_err) && empty($email_err) && empty($enroll_err) && empty($roll_err) && empty($mobile_err) && empty($password_err) && empty($confirm_password_err)){
        
        
        $sql = "INSERT INTO users (first, last, email, enroll, roll, mobile, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
         
            $stmt->bind_param("sssssss", $param_first, $param_last, $param_email, $param_enroll, $param_roll, $param_mobile, $param_password);
            
           
            $param_first = $first;
            $param_last = $last;
            $param_email = $email;
            $param_enroll = $enroll;
            $param_roll = $roll;
            $param_mobile = $mobile;
            

            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
           
            if($stmt->execute()){
              
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

      
            $stmt->close();
        }
    }
    
   
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="d-flex justify-content-center">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <img src="https://raw.githubusercontent.com/niranjan-exe/MIT-ADT-Quiz-Site/main/mit-logo.png" class="logo">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first" class="form-control <?php echo (!empty($first_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first; ?>">
                <span class="invalid-feedback"><?php echo $first_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last" class="form-control <?php echo (!empty($last_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last; ?>">
                <span class="invalid-feedback"><?php echo $last_err; ?></span>
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Enrollment Number</label>
                <input type="text" name="enroll" class="form-control <?php echo (!empty($enroll_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $enroll; ?>">
                <span class="invalid-feedback"><?php echo $enroll_err; ?></span>
            </div>
            <div class="form-group">
                <label>Roll Number</label>
                <input type="text" name="roll" class="form-control <?php echo (!empty($roll_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $roll; ?>">
                <span class="invalid-feedback"><?php echo $roll_err; ?></span>
            </div>
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile" class="form-control <?php echo (!empty($mobile_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobile; ?>">
                <span class="invalid-feedback"><?php echo $mobile_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group" id="form-buttons">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>