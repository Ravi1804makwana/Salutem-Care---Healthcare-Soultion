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
    	<title>Dashboard</title>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <?php require 'css.php'; ?>
    </head>

<?php

$dataPoints = array();
$sql = "SELECT count(*) as numbers, time_date from doctor_communication_history where doctor_id = '$id' group by time_date";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result))
{
    $date = date_format(date_create($row['time_date']), "M d, Y");
    array_push($dataPoints, array("y" => $row['numbers'], "label" => $date ));
}
?>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Patient's Treatments"
    },
    axisY: {
        title: "Number of patient(per day)"
    },
    axisX: {
        title: "Date"
    },
    data: [{
        type: "spline",
        xValueType: "dateTime",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>

<?php
    $sql = "SELECT * from doctor_communication_history where doctor_id = '$id'";
    $no = mysqli_num_rows(mysqli_query($con,$sql));
?>
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
                                        <h2 class="title-1">Welcome <b><?php echo $name; ?>,</b></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-25">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon py-3">
                                                    <i class="fa fa-user-md"></i>
                                                </div>
                                                <div class="text py-3">
                                                    <h2><?php echo $no;?>&nbsp;&nbsp;&nbsp;&nbsp;<span>Number of patient's treatments</span></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                        <div class="au-card-inner">
                                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                        </div>
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