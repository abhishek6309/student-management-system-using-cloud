<?php
require_once('../include/dbcon.php');
require_once('../include/header.php');

?>


<?php

$query = "select * from students";
$run = mysqli_query($con,$query);

?>
      <!-- The Coding Has Been Started From Here -->

      <nav class="teal">
        <div class="container">
          <div class="nav-wrapper">
            <a href="" class="brand-logo center">MIT ADT University</a>
            <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
          </div>        
        </div>
      </nav>


      <!-- The Dashboard Coding Started From Here -->

        <div class="row main">
            <div class="col l12 m12 s12">
                <div class="card">
                    <ul class="collection">
                        <li class="collection-item">
                        <table class="striped">
                            <tr class="cyan lighten-2 z-depth-1">
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Roll No</th>
                                <th>Course</th>
                                <th>Year</th>
                                <th>Specialization</th>
                                <th>Contact</th>
                            </tr>
                            
                                <?php
                                $count=0;
                                    while($data = mysqli_fetch_assoc($run)){
                                            $count++;
                                            $name = $data['name'];
                                            $rollno = $data['rollno'];
                                            $city  = $data['city'];
                                            $contact = $data['contact'];
                                            $course = $data['course'];
                                            $year = $data['year'];
                                            $specialization = $data['specialization'];
                                    
                                ?><tr>
                                    <td> <?php echo $count; ?> </td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $rollno; ?></td>
                                    <td><?php echo $course; ?></td>
                                    <td><?php echo $year; ?></td>
                                    <td><?php echo $specialization; ?></td>
                                    <td><?php echo $contact; ?></td>
                                    </tr>
                                <?php } ?>
                            
                        </table>
                    </li>
                    </ul>
                </div>
            </div>
        </div>

      <!-- The Navbar Menu Collection List -->
<?php

require_once('../include/sidenav.php');
?>
                   
<?php
require_once('../include/footer.php');
?>