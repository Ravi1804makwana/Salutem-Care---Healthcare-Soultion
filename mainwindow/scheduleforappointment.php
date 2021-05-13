<?php
include '../dbconnect.php';
include '../users/patient.php';
include '../users/doctor.php';
include '../users/medicalshop.php';
include '../users/laboratory.php';
session_start();
if (!isset($_SESSION['uname'])) {
    header("Location:../login.php");
}
require 'setup.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
    	<title>Schedule for appointments</title>
        <?php require 'css.php'; ?>
    </head>
    <body class="animsition">
        <div class="page-wrapper">
            <?php require 'headermobile.php'; ?>
            <?php require 'sidebar.php'; ?>
            <div class="page-container">
            <?php require 'header.php'; ?>
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap py-3">
                                        <h2 style="color: teal;">Scheduling for appointments</h2>
                                    </div>
                                    <div>
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <a href="../index.php">Home</a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php">Dashboard</a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <a>Schedule for appointments</a>
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $sql="Select d.doctor_profile_image, d.doctor_name, a.title, a.start from appointment as a Inner Join doctor as d on a.doctor_id=d.doctor_id where patient_id = '$id'";
                                $rs = mysqli_query($con, $sql);
                                if(mysqli_num_rows($rs)==0)
                                {
                                    echo "<h1>You have not scheduled any appointments.</h1>";
                                }
                                else
                                {
                                    while($row = mysqli_fetch_array($rs))
                                    {
                                        $doctor_profile_image= $row['doctor_profile_image'];
                                        $time = explode(' ', $row['start']);

                                          ?>
                                          <div class="row">
                                            <div class="col-lg-12">
                                                <div class="au-card recent-report">
                                                    <div class="au-card-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <img src='<?php echo $doctor_profile_image; ?>' />
                                                            </div>
                                                            <div class="col-lg-8 py-3">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Name : </th>
                                                                        <td><?php echo $row['doctor_name'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Time : </th>
                                                                        <td><?php echo $time[1];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Date : </th>
                                                                        <td><?php echo date('F d, Y',strtotime($time[0]));?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>            
                                                    </div>
                                                </div>
                                            </div>
                                           </div>
                                          <?php  
                              }
                                }
                            ?>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php require 'js.php'; ?>
    </body>
</html>
<!-- end document-->