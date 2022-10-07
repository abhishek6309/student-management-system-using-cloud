<?php
require_once('../include/dbcon.php');
require_once('../include/header.php');
error_reporting(0);
?>
  
<?php
 if(isset($_POST['search'])){

    $email = $_POST['email'];

    $query = "select * from teacher where `email` = '$email'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row < 1)
    {
        echo "<script> alert('No Techer Found')</script>";
    }
    else{
      $cookie_name = "email";
      $cookie_value = $email;
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST" )
    {
      if(isset($_COOKIE["email"] ) ) {
        $email = $_COOKIE["email"];
        $query = "delete from teacher where `email` = '$email'";
            $run = mysqli_query($con,$query);
            $row = mysqli_num_rows($run);
    if($row == 0)
    {
      echo "<script> alert('Deleted Successfully!')</script>";
    }
  }
    }


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
            <form action="" method="POST">
            <div class="card-panel">
              <div class="row">
                
              <div class="col l5">
                <div class="input-field">
                  <input type="text" name="email" id="email">
                  <label for="email">Enter Teacher's Email</label>
                </div>
              </div>
              <div class="col l3">
                  <div class="">
                      <button class="btn" name="search">Search</button>
                  </div>
                </div>
            </div>
          </div>
        </form>
        </div>
      </div>


        <div class="row main">
            <div class="col l12">
                <div class="card">
                    <ul class="collection">
                        <li class="collection-item">
                        <table class="striped">
                            <tr class="cyan lighten-2 z-depth-1">
                                <th>Sr. No</th>
                                <th>Student Image</th>
                                <th>Name</th>
                                <th>Roll No</th>
                                <th>Course</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>Contact</th>
                                <th>Delete</th>
                            </tr>
                            
                                <?php
                                $count=0;
                                    while($data = mysqli_fetch_assoc($run)){
                                            $count++;
                                            $image = $data['image'];
                                            $name = $data['name'];
                                            $rollno = $data['rollno'];
                                            $course = $data['course'];
                                            $gender = $data['gender'];
                                            $city  = $data['city'];
                                            $contact = $data['contact'];
                                            
                                    
                                ?><tr>
                                    <td> <?php echo $count; ?> </td>
                                    <td> <img src="images/<?php echo $image; ?>" class="responsive-img circle" style="width: 100px;"> </td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $rollno; ?></td>
                                    <td><?php echo $course; ?></td>
                                    <td><?php echo $gender; ?></td>
                                    <td><?php echo $city; ?></td>
                                    <td><?php echo $contact; ?></td>
                                    <td><form action="" method="post"><input type="submit" name="deleteStudent" value="Delete" /></form></td>
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