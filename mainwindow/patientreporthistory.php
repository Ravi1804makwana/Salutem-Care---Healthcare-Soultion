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
    	<title>Medical Reports History</title>
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
                                        <h2 class="title-1" style="color: teal;"><b>Medical Reports History</b></h2>
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
                                            Medical Reports History
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="title-2 m-b-25">Pending Reports</h3>
                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>Report Names</th>
                                                    <th>Assign By Doctor</th>
                                                    <th>Instruction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$sql = "SELECT mrl.report_name, d.doctor_name, mrl.report_instruction FROM medical_report_list AS mrl JOIN doctor AS d ON mrl.doctor_id=d.doctor_id WHERE patient_id='$id' ORDER BY id DESC";
$result = mysqli_query($con, $sql);
while ($data = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo "<td>" . $data['report_name'] . "</td>";
    echo "<td>" . $data['doctor_name'] . "</td>";
    echo "<td>" . $data['report_instruction'] . "</td>";
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
                                    <h3 class="title-2 m-b-25">Medical Report History</h3>
                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>Report Names</th>
                                                    <th>Issued By</th>
                                                    <th>Instruction</th>
                                                    <th>Report</th>
                                                    <th>Date & Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$sql = "SELECT mrh.report_name, l.laboratory_name, mrh.report_instruction, mrh.report_document, mrh.time_date FROM medical_report_history as mrh JOIN laboratory as l ON mrh.laboratory_id = l.laboratory_id WHERE patient_id='$id' ORDER BY id DESC";
$result = mysqli_query($con, $sql);
while ($data = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo "<td>" . $data['report_name'] . "</td>";
    echo "<td>" . $data['laboratory_name'] . "</td>";
    echo "<td>" . $data['report_instruction'] . "</td>";
    echo "<td> <a href = download.php?file=".$data['report_document'] .">Reports</a></td>";
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