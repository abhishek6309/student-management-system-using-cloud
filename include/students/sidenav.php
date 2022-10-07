<?php
require_once('../include/dbcon.php');
$student_id = $_SESSION['student_id'];
$query = "SELECT * FROM `students` WHERE `id`='$student_id'";
$run = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($run);
$name = $data['name'];
$email = $data['email']; 
$image = $data['image'];
$rollno = $data['rollno'];
$contact = $data['contact'];
?>
<ul id="slide-out" class="sidenav collapsible sidenav-fixed">
        <li class="user-view">
            <div class="background">
                <img src="../images/sms_bg.jpg" class="responsive-img" alt="">
            </div>
            <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "students.png";
                                    }
                                      ?>" alt="" class="responsive-img circle">
            </a>
            <span class="name white-text"><?php echo $name ?></span>
            <span class="email white-text"><?php echo $email ?></span>
        </li>
        <li><a href="/students/"><i class="material-icons">dashboard</i> Dashboard</a></li>
        
        <li><a href="/students/education.php"><i class="material-icons">dashboard</i>Educational Information</a></li>
        <li><a href="/students/internships.php"><i class="material-icons">dashboard</i>Internships</a></li>
        <li><a href="/students/achievements.php"><i class="material-icons">dashboard</i>Achievements</a></li>
        <li><a href="/students/parents.php"><i class="material-icons">dashboard</i>Parental Information</a></li>
        <div class="divider"></div>
        <li><a href="../include/students/logout.php"><i class="material-icons">logout</i>Logout</a></li>
    </ul>