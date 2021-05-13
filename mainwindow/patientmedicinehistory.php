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
    	<title>Medicines History</title>
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
                                    <div class="overview-wrap">
                                        <h2 class="title-1" style="color: teal;"><b>Medicines History</b></h2>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="../index.php">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="dashboard.php">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Medicines History
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="title-2 m-b-25">Pending Medicines</h3>
                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>Medicine Names</th>
                                                    <th>Assign By Doctor</th>
                                                    <th>PerDay</th>
                                                    <th>Course Duration</th>
                                                    <th>Instruction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

$sql = "SELECT ml.medicine_name, d.doctor_name, ml.medicine_per_day, ml.medicine_course_duration, ml.medicine_instruction FROM medicine_list as ml JOIN doctor as d ON ml.doctor_id=d.doctor_id WHERE patient_id='$id' ORDER BY id DESC";
$result = mysqli_query($con, $sql);
while ($data = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo "<td>" . $data['medicine_name'] . "</td>";
    echo "<td>" . $data['doctor_name'] . "</td>";
    echo "<td>" . $data['medicine_per_day'] . " per-day</td>";
    echo "<td>" . $data['medicine_course_duration'] . " days</td>";
    echo "<td>" . $data['medicine_instruction'] . "</td>";
    echo "</tr>";

}
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="title-2 m-b-25">Completed Medicine Courses</h3>
                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>Medicine Names</th>
                                                    <th>Medical Shop</th>
                                                    <th>PerDay</th>
                                                    <th>Course Duration</th>
                                                    <th>Instruction</th>
                                                    <th>Purchased Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$sql = "SELECT mh.medicine_name, ms.medical_shop_name, mh.medicine_per_day, mh.medicine_course_duration, mh.medicine_instruction, mh.time_date FROM medicine_history AS mh JOIN medical_shop AS ms ON mh.medical_shop_id=ms.medical_shop_id WHERE patient_id='$id' ORDER BY id DESC";
$result = mysqli_query($con, $sql);
while ($data = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo "<td>" . $data['medicine_name'] . "</td>";
    echo "<td>" . $data['medical_shop_name'] . "</td>";
    echo "<td>" . $data['medicine_per_day'] . " per-day</td>";
    echo "<td>" . $data['medicine_course_duration'] . " days</td>";
    echo "<td>" . $data['medicine_instruction'] . "</td>";
    echo "<td>" . $data['time_date'] . "</td>";
    echo "</tr>";
}
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'js.php'; ?>
    </body>
</html>
<!-- end document-->