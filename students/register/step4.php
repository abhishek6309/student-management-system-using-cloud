<?php

session_start();

if(isset($_SESSION['email']))
{
    require_once('../../include/dbcon.php');

    
    
    if($_POST){
    $SSCPercentage = $HSCPercentage = $DiplomaPercentage = $Semester1SGPA = $Semester2SGPA = $SemesterSGPA = $Semester4SGPA = $Semester5SGPA = $Semester6SGPA = $Semester7SGPA = $Semester8SGPA =  "";

    $SSCPercentage = $_POST['SSCPercentage'];
    $HSCPercentage = $_POST['HSCPercentage'];
    $DiplomaPercentage = $_POST['DiplomaPercentage'];
    $Semester1SGPA = $_POST['Semester1SGPA'];
    $Semester2SGPA = $_POST['Semester2SGPA'];
    $Semester3SGPA = $_POST['Semester3SGPA'];
    $Semester4SGPA = $_POST['Semester4SGPA'];
    $Semester5SGPA = $_POST['Semester5SGPA'];
    $Semester6SGPA = $_POST['Semester6SGPA'];
    $Semester7SGPA = $_POST['Semester7SGPA'];
    $Semester8SGPA = $_POST['Semester8SGPA'];
    
    $email = $_SESSION['email'];
    
    $sql = "UPDATE `students` SET `SSCPercentage`='$SSCPercentage',`HSCPercentage`='$HSCPercentage',`DiplomaPercentage` = '$DiplomaPercentage',`Semester1SGPA`='$Semester1SGPA', `Semester2SGPA` = '$Semester2SGPA', `Semester3SGPA` = '$Semester3SGPA', `Semester4SGPA` = '$Semester4SGPA',`Semester5SGPA` = '$Semester5SGPA',`Semester6SGPA` = '$Semester6SGPA',`Semester7SGPA` = '$Semester7SGPA',`Semester8SGPA` = '$Semester8SGPA' WHERE `email` = '$email'  ";
    $run= mysqli_query($con,$sql);
    if($run){
        $sql = "UPDATE `students` SET `step`= '5' WHERE `email`= '$email' ";
        $run= mysqli_query($con,$sql);
        header("location:step5.php");
        }    
    }

}else header("location:/")
?>
<html>
    <body>
    <head>
        <title>Student Registeration Step IV</title>
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
        <li>  Not <?php echo $_SESSION['email']; ?> </li>
        <li class="waves-effect waves-light"><a href="/include/logout.php">Logout</a></li>
    </ul>
</div>
</nav>

<div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                            <div class="card-content">
                                <h5>Student Registeration Step IV</h5>
                                <p>
                                    <i>Note: SSC is compulsory, fill all other fields according to current course. </i>
                                </p>
                            </div>
                            
                                <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input  type="text" name="SSCPercentage" id="SSCPercentage" required="required" min="0" max="100">
                                <label for="SSCPercentage">SSC Percentage</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="HSCPercentage" id="HSCPercentage" min="0" max="100">
                                <label for="HSCPercentage">HSC Percentage</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="DiplomaPercentage" id="DiplomaPercentage" min="0" max="100">
                                <label for="DiplomaPercentage">Diploma Percentage</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="Semester1SGPA" id="Semester1SGPA" min="0" max="10" >
                                <label for="Semester1SGPA">Semester 1 SGPA</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="Semester2SGPA" id="Semester2SGPA" min="0" max="10">
                                <label for="Semester2SGPA">Semester 2 SGPA</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="Semester3SGPA" id="Semester3SGPA" min="0" max="10">
                                <label for="Semester3SGPA">Semester 3 SGPA</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="Semester4SGPA" id="Semester4SGPA" min="0" max="10">
                                <label for="Semester4SGPA">Semester 4 SGPA</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="Semester5SGPA" id="Semester5SGPA" min="0" max="10">
                                <label for="Semester5SGPA">Semester 5 SGPA</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="Semester6SGPA" id="Semester6SGPA" min="0" max="10">
                                <label for="Semester6SGPA">Semester 6 SGPA</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="Semester7SGPA" id="Semester7SGPA" min="0" max="10">
                                <label for="Semester7SGPA">Semester 7 SGPA</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">
                                school
                                </i>
                                <input type="text" name="Semester8SGPA" id="Semester8SGPA" min="0" max="10">
                                <label for="Semester8SGPA">Semester 8 SGPA</label>
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