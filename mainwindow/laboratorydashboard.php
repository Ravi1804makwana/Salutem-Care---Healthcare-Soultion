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
$sql = "SELECT count(*) as numbers, time_date from medical_report_history where laboratory_id = '$id' group by time_date";
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
        text: "Issued Reports History "
    },
    axisY: {
        title: "Number of Reports(per day)"
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
    $sql = "SELECT * from medical_report_history where laboratory_id = '$id'";
    $no=mysqli_num_rows(mysqli_query($con, $sql));
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
                                        <h2 class="title-1">Welcome <b><?php echo $name;?>,</b></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-25">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="overview-item overview-item--c4">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="fa fa-plus-square"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $no;?></h2>
                                                    <span>Number of Issued Laboratory</span>
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