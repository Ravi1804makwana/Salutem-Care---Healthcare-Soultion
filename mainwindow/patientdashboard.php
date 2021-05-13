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
$dataPoints1 = array();
$sql1 = "SELECT count(*) as numbers, time_date from medicine_history where patient_id = '$id' group by time_date";
$result1 = mysqli_query($con, $sql1);

while($row1 = mysqli_fetch_array($result1))
{
    $date1 = date_format(date_create($row1['time_date']), "M d, Y");
    array_push($dataPoints1, array("y" => $row1['numbers'], "label" => $date1 ));
}

$dataPoints2 = array();
$sql2 = "SELECT count(*) as numbers, time_date from doctor_communication_history where patient_id = '$id' group by time_date";
$result2 = mysqli_query($con, $sql2);

while($row2 = mysqli_fetch_array($result2))
{
    $date2 = date_format(date_create($row2['time_date']), "M d, Y");
    array_push($dataPoints2, array("y" => $row2['numbers'], "label" => $date2 ));
}

$dataPoints3 = array();
$sql3 = "SELECT count(*) as numbers, time_date from medical_report_history where patient_id = '$id' group by time_date";
$result3 = mysqli_query($con, $sql3);

while($row3 = mysqli_fetch_array($result3))
{
    $date3 = date_format(date_create($row3['time_date']), "M d, Y");
    array_push($dataPoints3, array("y" => $row3['numbers'], "label" => $date3 ));
}

?>


<script>
window.onload = function() {
 
var chart1 = new CanvasJS.Chart("chartContainer1", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Medicines History"
    },
    axisY: {
        title: "Number of Medicines"
    },
    axisX: {
        title: "Date"
    },
    data: [{
        type: "spline",
        xValueType: "dateTime",
        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
    }]
});
chart1.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Communication with doctors"
    },
    axisY: {
        title: "Number of times(per day)"
    },
    axisX: {
        title: "Date"
    },
    data: [{
        type: "spline",
        xValueType: "dateTime",
        dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
    }]
});
chart2.render();

var chart3 = new CanvasJS.Chart("chartContainer3", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Medical Reports History"
    },
    axisY: {
        title: "Number of Reports"
    },
    axisX: {
        title: "Date"
    },
    data: [{
        type: "spline",
        xValueType: "dateTime",
        dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
    }]
});
chart3.render();
 
}
</script>

<?php
    $sql = "Select * from doctor_communication_history where patient_id ='$id'";
    $no1 = mysqli_num_rows(mysqli_query($con, $sql));
    $sql = "Select * from medicine_history where patient_id ='$id'";
    $no2 = mysqli_num_rows(mysqli_query($con, $sql));
    $sql = "Select * from medical_report_history where patient_id ='$id'";
    $no3 = mysqli_num_rows(mysqli_query($con, $sql));
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
                                        <h2 class="title-1">Welcome <b><?php echo $fname;?>,</b></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-25">
                                
                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="row">
                                                    <div class="icon px-2">
                                                        <i class="fa fa-stethoscope"></i>
                                                    </div>
                                                    <div class="text">
                                                        <h2><?php echo $no1; ?></h2>
                                                        <a href="patientrecentactivity.php"><span>Number of Prescription</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c2">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="fa fa-medkit"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $no2; ?></h2>
                                                    <a href="patientmedicinehistory.php"><span>Number of Medicines</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c3">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="fa fa-files-o"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $no3; ?></h2>
                                                    <a href="patientreporthistory.php"><span>Number of Reports</span></a>
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
                                            <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                        <div class="au-card-inner">
                                            <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                        <div class="au-card-inner">
                                            <div id="chartContainer3" style="height: 370px; width: 100%;"></div>
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