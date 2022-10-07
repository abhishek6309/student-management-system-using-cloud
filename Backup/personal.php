<?php
session_start();

//$_SESSION["enroll"] = $enroll;

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


?>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Update Personal Information</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> 
    </head>
    
    <body>
        <nav class="navbar bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="welcome.php"> <img src="mit-logo.png" alt="" width="auto" height="80px" class="d-inline-block align-text-top"> </a>
                <a href="logout.php">
                    <button class="btn btn-outline-danger me-2" type="button">Logout</button>
                </a>
            </div>
        </nav>
        <div class="d-flex justify-content-center" style="padding-top: 10px">
            <h2 id="personal-heading">Add/Update Personal Information</h2> </div>
        <div class="d-flex justify-content-center" style="padding-top: 10px">
            <form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]); ?>" method="post">
                <div class="form-group">
                    <div class="row g-2">
                        <div class="col-auto">
                            <input type="text" name="first" class="form-control" placeholder="First Name" disabled> </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Update</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row g-2">
                        <div class="col-auto">
                            <input type="text" name="last" class="form-control" placeholder="Last Name" disabled> </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Update</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row g-2">
                        <div class="col-auto">
                            <input type="text" name="email" class="form-control" placeholder="E-mail"> </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Update</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row g-2">
                        <div class="col-auto">
                            <input type="text" name="enroll" class="form-control" placeholder="Enrollment Number" disabled> </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Update</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row g-2">
                        <div class="col-auto">
                            <input type="text" name="adhar" class="form-control" placeholder="Adhar Number"> </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Update</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row g-2">
                        <div class="col-auto">
                            <input type="text" name="roll" class="form-control" placeholder="Roll Number" disabled> </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Update</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row g-2">
                        <div class="col-auto">
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile Number"> </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Update</button>
                        </div>
                    </div>
                </div>
                <div class="row g-2 form-group">
                    <div class="col-auto">
                        <input type="password" name="password" class="form-control" placeholder="Password"> </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Update</button>
                    </div>
                </div>
                <div class="row g-2 form-group">
                    <div class="col-auto">
                        <input type="text" name="address" class="form-control" placeholder="Address"> </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Update</button>
                    </div>
                </div>
                <div class="row g-2 form-group">
                    <div class="col-auto">
                        <input type="text" name="website" class="form-control" placeholder="Website"> </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Update</button>
                    </div>
                </div>
        </div>
        </form>
        </div>
    </body>
    
    </html>