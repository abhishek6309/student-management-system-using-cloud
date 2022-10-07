<?php require_once('../include/students/header.php'); ?>
<?php require_once('../include/students/sidenav.php'); ?>
    <nav class="brown darken-4">
        <a href="" class="brand-logo center">MIT ADT University</a>
        <!-- sidenav trigger code, means picture showing in right sight header sidenav, for account info and logout -->
        <a href="" class="sidenav-trigger" data-target="slide-out"><i class="material-icons">menu</i></a>
        <a href=""><img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                      ?>" class=" dropdown-trigger right responsive-img circle brand-logo " data-target="dropdown" alt="" style=" width: 40px; margin-top: 8px;margin-right: 8px;"></a>
    </nav>
    <div class="row mufazmi">
        <div class="col s12 m12 l3">
            <div class="card-panel z-depth-0" style="padding: 15px">
                <div class="card-image center">
                <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "teacher.png";
                                    }
                                      ?>" alt="" class="responsive-img circle" style="width: 120px; border: 3px solid gray;" alt="">
                    <h5 class="center"><?php echo $name ?></h5>
                    <div class="divider"></div>
                    <?php
 
    $query = "select * from students where `rollno` = '$rollno'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row < 1)
    {
        echo "Something Went Wrong";
    }
    else{

        $data= mysqli_fetch_assoc($run);
        //$image = $data['image'];
        //$name = $data['name'];
        //$rollno = $data['rollno'];
        $course = $data['course'];
        $year = $data['year'];
        $dob = $data['dob'];
        $address = $data['address'];
        $city  = $data['city'];
        $state = $data['state'];
        $zipcode = $data['zipcode'];
        $enrollmentNumber = $data['enrollmentNumber'];
        //$contact = $data['contact'];
?>
                    <table>
                        <thead>
                        <tr>
                                <th>Enrollment Number</th>
                                <td class="blue-text"><?php echo $enrollmentNumber ?></td>
                            </tr>
                            <tr>
                                <th>Roll Number</th>
                                <td class="blue-text"><?php echo $rollno ?></td>
                            </tr>
                            <tr>
                                <th>Course</th>
                                <td class="blue-text"><?php echo $course; ?></td>
                            </tr>
                            <tr>
                                <th>Year</th>
                                <td class="blue-text"><?php echo $year; ?></td>
                            </tr>

                        </thead>
                    </table>
                    <?php
    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l9">
            <div class="card z-depth-0">
                <ul class="tabs">
                    <li class="tab"><a href="#profile" class="">Profile</a></li>
                    
                </ul>
                <div id="profile" class="col s12 white " >
                        <div class="card"  style="padding-left:10px; padding-right: 10px; ">
                            <table >
                                <tbody>  
                                    <tr>
                                        <th>Date Of Birth</th>
                                        <td><?php echo $dob ; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Mobile Number</th>
                                        <td><?php echo $contact; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $email; ?></td>
                                    </tr>                                    
                                    <tr>
                                        <th>Address</th>
                                        <td><?php echo $address; ?></td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td><?php echo $state; ?></td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td><?php echo $city; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Zipcode</th>
                                        <td><?php echo $zipcode; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                </div>

            
            </div>
        </div>
    </div>

    <!-- right sidenav's profile pic dropdown -->

    <ul class="dropdown-content" id="dropdown">
       
    <li><a href="../include/students/logout.php"><i class="material-icons">logout</i>Logout</a></li>
       
    </ul>

<!-- ********************Footer Area************************ -->
<?php require_once('../include/students/footer.php'); ?>