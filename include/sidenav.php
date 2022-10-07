<?php
require_once('dbcon.php');
$uid = $_SESSION['uid'];
$query = "SELECT * FROM `teacher` WHERE `id`='$uid'";
$run = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($run);
$name = $data['name'];
$email = $data['email']; 
$image = $data['image'];
?>

<ul class="sidenav collapsible sidenav-fixed" id="slide-out">
        <li>
          <div class="user-view">
            <div class="background">
              <img src="../images/bg1.jpg" class="responsive-img" alt="">
            </div>
            <a href="profile.php" class="">
              <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "teacher.png";
                                    }
                                      ?>" alt="" class="responsive-img circle">
            </a>
            <span class="name"><?php echo $name; ?></span>
            <span class="email"><?php echo $email; ?></span>
          </div>
        </li>
        <li><a href="dashboard.php"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li>
          <div class="collapsible-header">
           <i class="collapsible-header material-icons">person</i> <span style="margin-left:25px;">Students</span>  <i class="material-icons right prefix " style="margin-right:0; margin-left:80px;">arrow_drop_down</i>
          </div>
          <div class="collapsible-body">
                <ul>
                  <li>
                  <a href="addstudent.php"><i class="material-icons">person_add</i>Add Student</a>
                  <li><a href="deletestudent.php"><i class="material-icons">delete</i>Delete Student</a></li>
                  <li><a href="allstudents.php"><i class="material-icons">person</i>All Students</a></li>
                  
                  </li>
                </ul>
          </div>
        </li>
        <li>
          <div class="collapsible-header">
            <ul>
              <li>
              <i class=" collapsible-header material-icons">person</i> <span style="margin-left:25px;">Teacher</span>  <i class="material-icons right prefix" style="margin-right:0; margin-left:80px;">arrow_drop_down</i>
              </li>
            </ul>
          </div>
          <div class="collapsible-body">
            <ul>
              <li>
              <li><a href="addteacher.php"><i class="material-icons">group_add</i>Add Teacher</a></li>
              <li><a href="deleteteacher.php"><i class="material-icons">delete</i>Delete Teachers</a></li>
              <li><a href="teachers.php"><i class="material-icons">groups</i>All Teachers</a></li>
              </li>
            </ul>
          </div>
        </li>
        <li>
        </li>
        
        <div class="divider"></div>
        <li><a href="../include/logout.php"><i class="material-icons">logout</i>Logout</a></li>

      </ul>
