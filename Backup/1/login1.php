<!doctype html>
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
          <h1 id="form-heading"> Login </h1>
            <div class="mb-3">
                <label for="enrollment" class="form-label">Enrollment Number</label>
                <input type="text" class="form-control" id="enrollment" placeholder="MITUXXXXXXXXXX">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password">
            </div>

            <div class="col-auto" id="form-buttons">
                <button type="submit" class="btn btn-primary mb-3">Login</button>
            </div>

          
        </form> 
    </div>
  </body>
</html>
