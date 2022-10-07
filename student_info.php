<?php
require_once('include/login_header.php');
?>
<?php
    require_once('include/dbcon.php');
    ?>
  
<!-- Session Checking -->
<?php
if(isset($_SESSION['uid']))
{

}
else{
  header("location:/login.php");
}

?>
<?php


?>

<nav class="brown darken-4">
    <div class="container">
        <a class="brand-logo hide-on-med-and-down" href="">MIT ADT University</a>
    <ul class="right">
        <li class="waves-effect waves-light"><a href="admin/dashboard.php">Dashboard</a></li>
        <li class="waves-effect waves-light"><a href="include/logout.php">Logout</a></li>

    </ul>
</div>
</nav>

   <body style="background-image:url(images/sms_bg.jpg); background-size: cover; background-repeat: no-repeat; ">
    <div class="row">
            <div class="col l4 offset-l4 m12 s12">
                <div class="card-panel with-header" style="border-radius: 15px; opacity: 0.9; margin-top: 25%;">
                    <div class="card-header center">
                        <h5>Student information</h5>
                    </div>
                    <form action="" method="POST">
                    
                    <div class="input-field">
                        <input type="text" name="rollno" id="rollno">
                        <label for="rollno">Enter Your Roll Number</label>
                    </div>
                    <div class="center">
                        <button class="btn waves-effect waves-light" name="submit" style="width: 100%; border-radius: 15px;">Show Information</button>
                    </div>
                </form>
                </div>
            </div>
    </div>

<?php
 if(isset($_POST)){
    $rollno = "";
    //$standerd = $_POST['standerd'];
    $rollno = $_REQUEST['rollno'];

    $query = "select * from students where `rollno` = '$rollno'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);


      

    if($row < 1)
    {
        echo "<script> alert('Please Enter Correct Information')</script>";
    }
    else{

        $data= mysqli_fetch_assoc($run);
        $image = $data['image'];
        $name = $data['name'];
        $rollno = $data['rollno'];
        $course = $data['course'];
        $year = $data['year'];
        $gender = $data['gender'];
        $city  = $data['city'];
        $contact = $data['contact'];
?>

    <!-- Table Coding-->

        <div class="row">
            <div class="col l6 offset-l3 m12 s12">
                <div class="card-panel" style="border-radius: 20px; opacity: 0.91">
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                            Personal Information
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>Name</th>
                                            <td><?php  echo $name; ?></td>
                                        </tr>
                                        <tr >
                                            <th>Roll No</th>
                                            <td><?php  echo $rollno; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Course</th>
                                            <td><?php  echo $course; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Year</th>
                                            <td><?php  echo $year; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Contact</th>
                                            <td><?php  echo $contact; ?></td>
                                        </tr>                                                              <tr>
                                            <th>City</th>
                                            <td><?php  echo $city; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
               </div>
        </div>
    </div>

    <div class="row">
            <div class="col l6 offset-l3 m12 s12">
                <div class="card-panel" style="border-radius: 20px; opacity: 0.91">
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                            Educational Information
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>SSC Percentage</th>
                                            <td><?php  echo $data['SSCPercentage']; ?></td>
                                        </tr>
                                        <tr >
                                            <th>HSC Percentage</th>
                                            <td><?php  echo $data['HSCPercentage']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Diploma Percentage</th>
                                            <td><?php  echo $data['DiplomaPercentage']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Semester 1 SGPA</th>
                                            <td><?php  echo $data['Semester1SGPA']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Semester 2 SGPA</th>
                                            <td><?php  echo $data['Semester2SGPA']; ?></td>
                                        </tr><tr>
                                            <th>Semester 3 SGPA</th>
                                            <td><?php  echo $data['Semester3SGPA']; ?></td>
                                        </tr><tr>
                                            <th>Semester 4 SGPA</th>
                                            <td><?php  echo $data['Semester4SGPA']; ?></td>
                                        </tr><tr>
                                            <th>Semester 5 SGPA</th>
                                            <td><?php  echo $data['Semester5SGPA']; ?></td>
                                        </tr><tr>
                                            <th>Semester 6 SGPA</th>
                                            <td><?php  echo $data['Semester6SGPA']; ?></td>
                                        </tr><tr>
                                            <th>Semester 7 SGPA</th>
                                            <td><?php  echo $data['Semester7SGPA']; ?></td>
                                        </tr><tr>
                                            <th>Semester 8 SGPA</th>
                                            <td><?php  echo $data['Semester8SGPA']; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
               </div>
        </div>
    </div>

    <div class="row">
            <div class="col l6 offset-l3 m12 s12">
                <div class="card-panel" style="border-radius: 20px; opacity: 0.91">
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                            Internship #1
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>Company Name</th>
                                            <td><?php  echo $data['internship_company']; ?></td>
                                        </tr>
                                        <tr >
                                            <th>Role</th>
                                            <td><?php  echo $data['internship_role']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Period</th>
                                            <td><?php  echo "From ".$data['internship_from']." to ".$data['internship_to'].""; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>

                        
                    </div>

                    <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                            Internship #2
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>Company Name</th>
                                            <td><?php  echo $data['internship_company1']; ?></td>
                                        </tr>
                                        <tr >
                                            <th>Role</th>
                                            <td><?php  echo $data['internship_role1']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Period</th>
                                            <td><?php  echo "From ".$data['internship_from1']." to ".$data['internship_to1'].""; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                            Internship #3
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>Company Name</th>
                                            <td><?php  echo $data['internship_company2']; ?></td>
                                        </tr>
                                        <tr >
                                            <th>Role</th>
                                            <td><?php  echo $data['internship_role2']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Period</th>
                                            <td><?php  echo "From ".$data['internship_from2']." to ".$data['internship_to2'].""; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>

               </div>
        </div>
        
    </div>

    <div class="row">
            <div class="col l6 offset-l3 m12 s12">
                <div class="card-panel" style="border-radius: 20px; opacity: 0.91">
                <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                        Achievement #1
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>Achievement</th>
                                            <td><?php  echo $data['achievement']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td><?php  echo $data['achievement_desc']; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                        Achievement #2
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>Achievement</th>
                                            <td><?php  echo $data['achievement1']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td><?php  echo $data['achievement_desc1']; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                        Achievement #3
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>Achievement</th>
                                            <td><?php  echo $data['achievement2']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td><?php  echo $data['achievement_desc2']; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>

               </div>
        </div>
        
    </div>

    <div class="row">
            <div class="col l6 offset-l3 m12 s12">
                <div class="card-panel" style="border-radius: 20px; opacity: 0.91">
                <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                        Parental Information
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>Father's Name</th>
                                            <td><?php  echo $data['f_name']; ?></td>
                                        </tr>
                                        <tr >
                                            <th>Father's Mobile Number</th>
                                            <td><?php  echo $data['f_contact']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Father's Email</th>
                                            <td><?php  echo $data['f_email']; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                        
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>Mother's Name</th>
                                            <td><?php  echo $data['m_name']; ?></td>
                                        </tr>
                                        <tr >
                                            <th>Mother's Mobile Number</th>
                                            <td><?php  echo $data['m_contact']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Mother's Email</th>
                                            <td><?php  echo $data['m_email']; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>

               </div>
        </div>
        
    </div>


<?php
    }
}
?>

                    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<!-- Compiled and minified JavaScript --> 
<script>
 $(document).ready(function(){

$('select').formSelect();
});
</script>
</body>
</html>




                    