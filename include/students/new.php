<?php
//require_once('/inclde/login_header.php');
?>
<?php

    require_once('/include/dbcon.php');

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
                            <button type="submit" name="login" class="btn" style="width: 100%; border-radius: 15px;">Login</button>
                        </div><br>New User? Click here to <a href="/students/register/">SignUp.
                        </div>
            </form>
        </div>
    </div>
  
                    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>