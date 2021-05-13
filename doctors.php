<?php
include 'dbconnect.php';
include 'header.php';

if(!isset($_SESSION['obj']))
    header("Location: login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Take Appointment</title>    
</head>
<body>
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <section class="banner-area other-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Take Appointment</h1>
                    <a href="index.php">Home</a> <span>|</span> Take Appointment
                </div>
            </div>
        </div>
    </section>
    <section class="specialist-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top text-center">
                        <h2>Search Doctors</h2>
                        <br/>
                            <form method="get">
                                <div class="row">
                                    <div class="col-lg-5 form-group">
                                        <select name="column" class="form-control">
                                        <option value="">Select Your Search Category</option>
                                        <option value="doctor_name">Doctor Name</option>
                                        <option value="specialization">Specialization</option>
                                        <option value="doctor_information">Experience</option>
                                    </select>
                                   </div>
                                    <div class="col-lg-5 form-group">
                                        <input type="text" required name="doctor_information" placeholder="Categories" class="form-control"/>
                                    </div>
                                    <div class="col-lg-2 form-group">
                                        <input type="submit" name="search" value="Search" class="btn btn-outline-primary btn-block"/>   
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php

                $condition="";
                if(isset($_GET['column']) && isset($_GET['doctor_information']))
                    $condition = "WHERE ". $_GET['column'] ." like '%".$_GET['doctor_information']."%'";
                
                $sql = "SELECT * FROM doctor ".$condition;
                $rs = mysqli_query($con, $sql);
                while($row = mysqli_fetch_array($rs))
                {
                    $doctor_id = $row["doctor_id"];
                    ?>
                    <div class="col-lg-3 col-sm-6">
                    <div class="single-doctor mb-4 mb-lg-0">
                        <div class="doctor-img">
                            <img src="<?php echo $row['doctor_profile_image']; ?>" alt="" class="img-fluid">
                        </div>
                        <div class="content-area">
                            <div class="doctor-name text-center">
                                <h3><?php echo $row["doctor_name"]; ?></h3>
                            </div>
                            <div class="doctor-text text-center">
                                <p><?php echo $row["specialization"];?></p>
                                <a href="registerappointment.php?doctor_id=<?php echo $doctor_id;?>">
                                    <button class="btn btn-primary">Take Appointment</button>
                                </a>
                                <br/>
                                <br/>
                                <ul class="doctor-icon">
                                    <li><a href="<?php echo 'tel:'.$row['doctor_phoneno']; ?>"><i class="fa fa-phone"></i><a></li>
                                    <li><a href="<?php echo 'mailto:'.$row['doctor_email']; ?>"><i class="fa fa-envelope"></i><a></li>
                                    <li><a href="videocall.php?doctor_id=<?php echo $doctor_id;?>"><i class="fa fa-video-camera"></i><a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
                }                      
                ?>
            </div>
        </div>
    </section>
    <!-- Specialist Area Starts -->

</body>
</html>
<?php include 'footer.php';?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>