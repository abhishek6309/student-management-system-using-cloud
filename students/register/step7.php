<?php

session_start();

if(isset($_SESSION['email']))
{
    require_once('../../include/dbcon.php');

    
    
    if($_POST){
    $achievement = $achievement_desc = $achievement1 = $achievement_desc1 = $achievement2 = $achievement_desc2 = "";
    
    $achievement = $_POST['achievement'];
    $achievement_desc = $_POST['achievement_desc'];

    $achievement1 = $_POST['achievement1'];
    $achievement_desc1 = $_POST['achievement_desc1'];

    $achievement2 = $_POST['achievement2'];
    $achievement_desc2 = $_POST['achievement_desc2'];
    
    $email = $_SESSION['email'];
    $sql = "UPDATE `students` SET `achievement` = '$achievement',`achievement_desc` = '$achievement_desc',`achievement1` = '$achievement1',`achievement_desc1` = '$achievement_desc1',`achievement2` = '$achievement2',`achievement_desc2` = '$achievement_desc2' WHERE  `email` = '$email' ";
    $run= mysqli_query($con,$sql);
    if($run){
        $sql = "UPDATE `students` SET `step`= '8' WHERE `email`= '$email' ";
        $run= mysqli_query($con,$sql);
        header("location:success.php");
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
                            <div class="card-content " style="text-align: center;">
                                <h5>Student Registeration Step VII</h5>
                                <h5 >Achievements</h5>
                            </div>
                            
                            <div class="input-field">
                                <i class="material-icons prefix">stars</i>
                                <input type="text" name="achievement" id="achievement">
                                <label for="achievement">Achievement</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">format_list_bulleted</i>
                                <input type="text" name="achievement_desc" id="achievement_desc" >
                                <label for="achievement_desc">Achievement Description</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">stars</i>
                                <input type="text" name="achievement1" id="achievement1">
                                <label for="achievement1">Achievement (Optional)</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">format_list_bulleted</i>
                                <input type="text" name="achievement_desc1" id="achievement_desc1" >
                                <label for="achievement_desc1">Achievement Description(Optional)</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">stars</i>
                                <input type="text" name="achievement2" id="achievement2">
                                <label for="achievement2">Achievement(Optional)</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">format_list_bulleted</i>
                                <input type="text" name="achievement_desc2" id="achievement_desc2" >
                                <label for="achievement_desc2">Achievement Description(Optional)</label>
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