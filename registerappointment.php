<?php include 'header.php'; ?>
<?php 
  include 'dbconnect.php';
  
if(!isset($_SESSION['obj']))
    header("Location: login.php");
  
  $doctor_id = $_GET['doctor_id'];
  $sql = "Select * from doctor where doctor_id = '$doctor_id'";
  $row = mysqli_fetch_array(mysqli_query($con, $sql));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $row['doctor_name'];?></title>
</head>
<body>
    <div class="preloader">
        <div class="spinner"></div>
    </div>

    <section class="banner-area other-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Schedule Meeting</h1>
                    <a href="index.html">Home</a> <span>|</span> <a href="doctors.php">Take Appointment</a> <span> |</span> Schedule Meeting 
                </div>
            </div>
        </div>
    </section>

    <section class="welcome-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 align-self-center">
                    <div class="welcome-img">
                        <img src="<?php echo $row['doctor_profile_image'];?>" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="welcome-text mt-5 mt-lg-0">
                        <h2><?php echo $row['doctor_name'];?></h2>
                        <table style="font-size: 20px;" cellpadding="10px">
                          <tr>
                            <td>Specialization</td>
                            <td><?php echo $row["specialization"];?></td>
                          </tr>
                          <tr>
                            <td>Education</td>
                            <td><?php echo $row["education"];?></td>
                          </tr>
                          <tr>
                            <td>Email Address</td>
                            <td><?php echo $row["doctor_email"];?></td>
                          </tr>
                          <tr>
                            <td>Phone Number</td>
                            <td><?php echo $row["doctor_phoneno"];?></td>
                          </tr>
                          <tr>
                            <td>Address</td>
                            <td><?php echo $row["doctor_address"];?></td>
                          </tr>
                          <tr>
                            <td>Opening Time</td>
                            <td><?php echo $row["opening_time"];?></td>
                          </tr>
                          <tr>
                            <td>Closing Time</td>
                            <td><?php echo $row["closing_time"];?></td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              <a href="<?php echo 'tel:'.$row['doctor_phoneno']; ?>"><i class="fa fa-phone"></i><a>&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="<?php echo 'mailto:'.$row['doctor_email']; ?>"><i class="fa fa-envelope"></i><a>&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="videocall.php?doctor_id=<?php echo $doctor_id;?>"><i class="fa fa-video-camera"></i><a>
                            </td>
                          </tr>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="patient-area section-padding3">
        <div class="container">
          <iframe style="height: 500px;" src="Calendar/index.php?doctor_id=<?php echo $doctor_id; ?>" class="col-lg-12"></iframe>
        </div>
    </section>
</body>
</html>
<?php include "footer.php";?>