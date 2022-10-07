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
        
        <div class="col s12 m12 l9">
            <div class="card z-depth-0">
                <ul class="tabs">
                    <li class="tab"><a href="#profile" class="">Educational Information</a></li>
                    
                </ul>
                <div id="profile" class="col s12 white " >
                        <div class="card"  style="padding-left:10px; padding-right: 10px; ">
                            <table >

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
                        }?>

                                <tbody>  
                                    <tr>
                                        <th>SSC Percentage</th>
                                        <td><?php echo $data['SSCPercentage'] ; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>HSC Percentage</th>
                                        <td><?php echo $data['HSCPercentage']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Diploma Percentage</th>
                                        <td><?php echo $data['DiplomaPercentage']; ?></td>
                                    </tr>                                    
                                    <tr>
                                        <th>Semester I SGPA</th>
                                        <td><?php echo $data['Semester1SGPA']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Semester 2 SGPA</th>
                                        <td><?php echo $data['Semester2SGPA']; ?></td>
                                    </tr><tr>
                                        <th>Semester 3 SGPA</th>
                                        <td><?php echo $data['Semester3SGPA']; ?></td>
                                    </tr><tr>
                                        <th>Semester 4 SGPA</th>
                                        <td><?php echo $data['Semester4SGPA']; ?></td>
                                    </tr><tr>
                                        <th>Semester 5 SGPA</th>
                                        <td><?php echo $data['Semester5SGPA']; ?></td>
                                    </tr><tr>
                                        <th>Semester 6 SGPA</th>
                                        <td><?php echo $data['Semester6SGPA']; ?></td>
                                    </tr><tr>
                                        <th>Semester 7 SGPA</th>
                                        <td><?php echo $data['Semester7SGPA']; ?></td>
                                    </tr><tr>
                                        <th>Semester 8 SGPA</th>
                                        <td><?php echo $data['Semester8SGPA']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                </div>

            
            </div>
        </div>
    </div>

       
    <li><a href="../include/students/logout.php"><i class="material-icons">logout</i>Logout</a></li>
       
    </ul>

<?php require_once('../include/students/footer.php'); ?>