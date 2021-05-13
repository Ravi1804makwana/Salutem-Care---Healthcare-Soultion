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
    	<title>Pending Appointment</title>
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
                                        <h2 class="title-1" style="color: teal;"><b>Pending Appointments</b></h2>
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
                                            Pending Appointments
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
                                                    <th>Sr No.</th>
                                                    <th>Patient Name</th>
                                                    <th>Reason</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$sql = "SELECT p.patient_fname, p.patient_mname, p.patient_lname, a.title, a.start, a.end FROM appointment AS a JOIN patient AS p ON a.patient_id=p.patient_id Where doctor_id = '$id'";
$result = mysqli_query($con, $sql);
$c=1;
while ($data = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo "<td>" . ($c++) . "</td>";
    echo "<td>" . $data['patient_fname']." ".$data['patient_mname']." ".$data['patient_lname']. "</td>";
    echo "<td>" . $data['title'] . "</td>";
    echo "<td>" . $data['start'] . "</td>";
    echo "<td>" . $data['end'] . "</td>";
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