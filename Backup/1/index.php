<?php

require_once "config.php";

$first = $last = $email = $enrollment = $mobile = $roll = $password = $confirm_password = "";

$firstname = isset($_POST['first']) ? $_POST['first'] : '' ;
$lastname = isset($_POST['last']) ? $_POST['last'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$enrollment = isset($_POST['enrollment']) ? $_POST['enrollment'] : '';
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
$roll = isset($_POST['roll']) ? $_POST['roll'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$sql = "INSERT INTO personal (first, last, email, enrollment, mobile, roll, password )
VALUES ('$firstname', '$lastname', '$email', '$enrollment', '$mobile', '$roll', '$password')";

if ($mysqli->query($sql) === TRUE) {
    header("location: login.php");
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

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
            </div>

            <div class="mb-3">
                <label for="last" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last" placeholder="Doe" required>
            </div>

            <div class="mb-3">
                <label for="e-mail" class="form-label">E-mail</label>
                <input type="text" class="form-control" name="email" placeholder="E-mail" required>
            </div>

            <div class="mb-3">
                <label for="enrollment" class="form-label">Enrollment Number</label>
                <input type="text" class="form-control" name="enrollment" placeholder="MITUXXXXXXXXXX" required>
            </div>

            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" name="mobile" placeholder="9890XXXXXX" min="10" max="10" required>
            </div>

            <div class="mb-3">
                <label for="roll" class="form-label">Roll Number</label>
                <input type="text" class="form-control" name="roll" placeholder="22XXXXX" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm-password" required>
            </div>

            <div class="col-auto" id="form-buttons">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>

                <button type="reset" class="btn btn-danger mb-3" >Reset</button>
            </div>          
        </form> 
    </div>
  </body>
</html>
