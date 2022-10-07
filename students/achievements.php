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
                        <div class="row mufazmi">
        <div class="col s12 m12 l9">
            <div class="card z-depth-0">
                <ul class="tabs">
                    <li class="tab"><a href="#internship" class="">Achievement #1</a></li>
                
                </ul>
                <div id="profile" class="col s12 white " >
                        <div class="card"  style="padding-left:10px; padding-right: 10px; ">
                        <table>    
                                <tbody>  
                                    <tr>
                                        <th>Achievement</th>
                                        <td><?php echo $data['achievement'] ; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Description</th>
                                        <td><?php echo $data['achievement_desc']; ?></td>
                                    </tr>                                                                  </tbody>
                            </table>
                            
                        </div>

                </div>

            
            </div>
        </div>
    </div>
    <<div class="row mufazmi">
        <div class="col s12 m12 l9">
            <div class="card z-depth-0">
                <ul class="tabs">
                    <li class="tab"><a href="#internship" class="">Achievement #2</a></li>
                
                </ul>
                <div id="profile" class="col s12 white " >
                        <div class="card"  style="padding-left:10px; padding-right: 10px; ">
                        <table>    
                                <tbody>  
                                    <tr>
                                        <th>Achievement</th>
                                        <td><?php echo $data['achievement1'] ; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Description</th>
                                        <td><?php echo $data['achievement_desc1']; ?></td>
                                    </tr>                                                                  </tbody>
                            </table>
                            
                        </div>

                </div>

            
            </div>
        </div>
    </div><div class="row mufazmi">
        <div class="col s12 m12 l9">
            <div class="card z-depth-0">
                <ul class="tabs">
                    <li class="tab"><a href="#internship" class="">Achievement #3</a></li>
                
                </ul>
                <div id="" class="col s12 white " >
                        <div class="card"  style="padding-left:10px; padding-right: 10px; ">
                        <table>    
                                <tbody>  
                                    <tr>
                                        <th>Achievement</th>
                                        <td><?php echo $data['achievement2'] ; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Description</th>
                                        <td><?php echo $data['achievement_desc2']; ?></td>
                                    </tr>                                                                  </tbody>
                            </table>
                            
                        </div>

                </div>

            
            </div>
        </div>
    </div>

<?php require_once('../include/students/footer.php'); ?>