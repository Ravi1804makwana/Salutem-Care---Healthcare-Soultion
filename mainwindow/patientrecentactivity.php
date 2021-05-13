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
    	<title>Recent Activities</title>
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
                                        <h2 class="title-1" style="color: teal;"><b>Recent Activites</b></h2>
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
                                            Recent Activities
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Doctor</th>
                                                    <th>Instruction</th>
                                                    <th>Date & Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

$patient_id = $id;
$sql = "SELECT * FROM doctor_communication_history as dch JOIN doctor as d ON dch.doctor_id=d.doctor_id WHERE patient_id='$patient_id' ORDER BY id DESC";
$result = mysqli_query($con, $sql);
$c = 1;
while ($data = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo "<td>" . $c . "</td>";
    echo "<td>" . $data['doctor_name'] . "</td>";
    echo "<td>" . $data['communication'] . "</td>";
    echo "<td>" . $data['time_date'] . "</td>";
    echo "</tr>";
    $c++;

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