<?php

session_start();

if(isset($_SESSION['email']))
{
    require_once('../../include/dbcon.php');

    
    
    if($_POST){
    $f_name = $f_contact = $f_email = $m_name = $m_contact = $m_email = "";

    $f_name = $_POST['f_name'];
    $f_contact = $_POST['f_contact'];
    $f_email = $_POST['f_email'];
    $m_name = $_POST['m_name'];
    $m_contact = $_POST['m_contact'];
    $m_email = $_POST['m_email'];
    
    $email = $_SESSION['email'];
    $sql = "UPDATE `students` SET `f_name`='$f_name',`f_contact`='$f_contact',`f_email` = '$f_email',`m_name`='$m_name',`m_contact`='$m_contact',`m_email` = '$m_email' WHERE  `email` = '$email'  ";
    $run= mysqli_query($con,$sql);
    if($run){
        $sql = "UPDATE `students` SET `step`= '6' WHERE `email`= '$email' ";
        $run= mysqli_query($con,$sql);
        header("location:step6.php");
        }    
    }

}else header("location:/")
?>
<html>
    <body>
    <head>
    <title>Student Registeration Step V</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/../../css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body style="background-image:url(../../images/sms_bg.jpg); background-size: cover;">
  <nav class="brown darken-4">
    <div class="container">
        <a class="brand-logo hide-on-med-and-down" href="/">MIT ADT University</a>
    <ul class="right">
        <li>  Not <?php echo $_SESSION['email']; ?>? </li>
        <li class="waves-effect waves-light"><a href="/include/logout.php">Logout</a></li>
    </ul>
</div>
</nav>

<div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                            <div class="card-content">
                                <h5>Student Registeration Step V</h5>
                            </div>
                            
                            <div class="input-field">
                                <i class="material-icons prefix">
                                person
                                </i>
                                <input type="text" name="f_name" id="f_name" required="required" >
                                <label for="name">Father's Full Name</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                local_phone
                                </i>
                                <input type="number" name="f_contact" id="f_contact" required="required" >
                                <label for="name">Father's Mobile Number</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                email
                                </i>
                                <input type="email" name="f_email" id="f_email">
                                <label for="name">Father's Email (Optional)</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                person
                                </i>
                                <input type="text" name="m_name" id="m_name" required="required" >
                                <label for="name">Mother's Full Name</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                local_phone
                                </i>
                                <input type="number" name="m_contact" id="m_contact" required="required" >
                                <label for="name">Mother's Mobile Number</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                email
                                </i>
                                <input type="email" name="m_email" id="m_email">
                                <label for="name">Mother's Email (Optional)</label>
                            </div>
                            <div>
                            <button type="submit" name="submit" class="btn" style="width: 100%; border-radius: 15px;">Next</button>
                        </div>
                        </div>
            </form>
        </div>
    </div>
  
    <!--Import jQuery before materialize.js-->
<script type="text/javascript" src="../../js/materialize.min.js"></script>
    </body>
</html>