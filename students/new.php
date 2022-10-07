<?php
//require_once('/include/login_header.php');
?>
<?php

$dbname = "sms";
$dbusername ="root";
$dbpassword = "";
$dbhost = "localhost";

$con = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);

    if(isset($_POST)){

    $course = $_POST['course'];
    

    
    $query = "SELECT * FROM `students` WHERE `course` = '$course'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row < 1)
    {
    }
    else{
        $data = mysqli_fetch_assoc($run);
        echo $data['course'];
    }
}
?>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/../../css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body style="background-image:url(../images/sms_bg.jpg); background-size: cover;">
  <nav class="brown darken-4">
    <div class="container">
        <a class="brand-logo hide-on-med-and-down" href="">MIT ADT University</a>
    <ul class="right">
        <li class="waves-effect waves-light"><a href="login.php">Teacher Login</a></li>
    </ul>
</div>
</nav>
    <div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                            <div class="card-content">
                                
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    person
                                </i>
                                <input type="text" name="course" id="course" required="required">
                                <label for="course">course</label>
                            </div>
                            
                            <div>
                            <button type="submit" name="submit" class="btn" style="width: 100%; border-radius: 15px;">Login</button>
                        </div>
                        </div>
            </form>
        </div>
    </div>
    <?php echo $data['course']; ?>
                    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>