<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="welcome.php">
      <img src="mit-logo.png" alt="" width="auto" height="80px" class="d-inline-block align-text-top">
    </a>
    <a href="logout.php">
    <button class="btn btn-outline-danger me-2" type="button">Logout</button>
    </a>
  </div>
</nav>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["enroll"]); ?></b>.</h1>
    <p>
        <a href="personal.php" class="btn btn-success">Personal Information</a>&nbsp&nbsp&nbsp
        <a href="educational.php" class="btn btn-warning">Educational Information</a> &nbsp&nbsp&nbsp      
    </p>
</body>
</html>