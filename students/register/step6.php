<?php

session_start();

if(isset($_SESSION['email']))
{
    require_once('../../include/dbcon.php');

    
    
    if($_POST){
    $internship_company = $internship_role = $internship_from = $internship_to = $internship_company1 = $internship_role1 = $internship_from1 = $internship_to1 =$internship_company2 = $internship_role2 = $internship_from2 = $internshipe_to2 = "";

    $internship_company = $_POST['internship_company'];
    $internship_role = $_POST['internship_role'];
    $internship_from = $_POST['internship_from'];
    $internship_to = $_POST['internship_to'];
    
    $internship_company1 = $_POST['internship_company1'];
    $internship_role1 = $_POST['internship_role1'];
    $internship_from1 = $_POST['internship_from1'];
    $internship_to1 = $_POST['internship_to1'];

    $internship_company2 = $_POST['internship_company2'];
    $internship_role2 = $_POST['internship_role2'];
    $internship_from2 = $_POST['internship_from2'];
    $internship_to2 = $_POST['internship_to2'];

    $email = $_SESSION['email'];
    $sql = "UPDATE `students` SET `internship_company` = '$internship_company',`internship_role` = '$internship_role',`internship_from` = '$internship_from',`internship_to` = '$internship_to',`internship_company1` = '$internship_company1',`internship_role1` = '$internship_role1',`internship_from1` = '$internship_from1',`internship_to1` = '$internship_to1',`internship_company2` = '$internship_company2',`internship_role2` = '$internship_role2',`internship_from2` = '$internship_from2',`internship_to2` = '$internship_to2' WHERE  `email` = '$email'  ";
    $run= mysqli_query($con,$sql);
    if($run){
        $sql = "UPDATE `students` SET `step`= '7' WHERE `email`= '$email' ";
        $run= mysqli_query($con,$sql);
        header("location:step7.php");
        }    
    }

}else header("location:/")
?>
<html>
    <body>
    <head>
    <title>Student Registeration Step VI</title>
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
                                <h5>Student Registeration Step VI</h5>
                            </div>
                            
                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="internship_company" id="internship_company" >
                                <label for="internship_company">Internship Company</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                person
                                </i>
                                <input type="text" name="internship_role" id="internship_role" >
                                <label for="internship_role">Internship Role</label>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <i class="material-icons prefix">date_range</i>
                                        <input type="date" name="internship_from" id="internship_from">
                                        <label for="internship_from">Period(from)</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <i class="material-icons prefix">date_range</i>
                                        <input type="date" name="internship_to" id="internship_to">
                                        <label for="internship_to">Period(to)</label>
                                    </div>
                                </div>
                            </div>
                            <p><i>#2 Optional</i></p>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="internship_company1" id="internship_company1">
                                <label for="internship_company1">Internship Company</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                person
                                </i>
                                <input type="text" name="internship_role1" id="internship_role1">
                                <label for="internship_role1">Internship Role</label>
                            </div>

                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <i class="material-icons prefix">date_range</i>
                                        <input type="date" name="internship_from1" id="internship_from1">
                                        <label for="internship_from1">Period(from)</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <i class="material-icons prefix">date_range</i>
                                        <input type="date" name="internship_to1" id="internship_to1">
                                        <label for="internship_to1">Period(to)</label>
                                    </div>
                                </div>
                            </div>
                            <p><i>#3 Optional</i></p>
                            
                            <div class="input-field">
                                <i class="material-icons prefix">school</i>
                                <input type="text" name="internship_company2" id="internship_company2"   >
                                <label for="internship_company2">Internship Company</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="internship_role2" id="internship_role2"   >
                                <label for="internship_role2">Internship Role</label>
                            </div>
                            
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <i class="material-icons prefix">date_range</i>
                                        <input type="date" name="internship_from2" id="internship_from2">
                                        <label for="internship_from2">Period(from)</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <i class="material-icons prefix">date_range</i>
                                        <input type="date" name="internship_to2" id="internship_to2">
                                        <label for="internship_to2">Period(to)</label>
                                    </div>
                                </div>
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