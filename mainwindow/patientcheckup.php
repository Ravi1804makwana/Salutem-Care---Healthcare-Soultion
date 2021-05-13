<?php
require_once('../dbconnect.php');
require_once('../users/patient.php');
require_once('../users/doctor.php');
require_once('../users/medicalshop.php');
require_once('../users/laboratory.php');

session_start();
require_once('setup.php');
if (!isset($_SESSION['uname'])) {
    header("Location:../login.php");
}

function getAge($date) {
    $dob = new DateTime($date);
    $now = new DateTime();
    $difference = $now->diff($dob);
    $age = $difference->y;
    return $age;
}

if(!isset($_SESSION['patient']))
    header("Location: secretkey.php");

$patient_id = $_SESSION['patient']->patient_id;
$patient_fname = $_SESSION['patient']->patient_fname;
$patient_mname = $_SESSION['patient']->patient_mname;
$patient_lname = $_SESSION['patient']->patient_lname;
$patient_age = getAge($_SESSION['patient']->patient_dateofbirth);
$patient_phoneno = $_SESSION['patient']->patient_phoneno;
$patient_profile_image = $_SESSION['patient']->patient_profile_image;
$patient_address = $_SESSION['patient']->patient_address;
$patient_bloodgroup = $_SESSION['patient']->patient_bloodgroup;

//If patient appointment on day then automatically data is deleted from appointment table

$sql = "DELETE FROM appointment WHERE patient_id = '$patient_id' AND doctor_id = '$id'";
mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Patient Treatment</title>
        <?php require 'css.php'; ?>
        <script type="text/javascript">
            function form1() {
                var communication = $("#communication").val();
                var doctor_id = $("#doctor_id").val();
                var patient_id = $("#patient_id").val();
                var time_date = $("#time_date").val();
                $.post("communication.php", {communication: communication, doctor_id: doctor_id, patient_id: patient_id, time_date: time_date},
                        function (data) {
                            $('#results1').html(data);
                            $('#form1')[0].reset();
                        });
            }

            function form2() {
                var patient_id2 = $("#patient_id2").val();
                var doctor_id2 = $("#doctor_id2").val();
                var medicine_name2 = $('#medicine_name2').val();
                var quantity2 = $('#quantity2').val();
                var medicine_per_day2 = $('#medicine_per_day2').val();
                var medicine_course_duration2 = $('#medicine_course_duration2').val();
                var medicine_instruction2 = $('#medicine_instruction2').val();
                $.post("addmedicines.php", {patient_id2: patient_id2, doctor_id2: doctor_id2, medicine_name2: medicine_name2, quantity2: quantity2, medicine_per_day2: medicine_per_day2, medicine_course_duration2: medicine_course_duration2, medicine_instruction2: medicine_instruction2},
                        function (data) {
                            $('#results2').html(data);
                            $('#form2')[0].reset();
                        });
            }

            function form3() {
                var patient_id3 = $('#patient_id3').val();
                var doctor_id3 = $('#doctor_id3').val();
                var report_name3 = $('#report_name3').val();
                var report_instruction3 = $('#report_instruction3').val();

                $.post("addmedicalreport.php", {patient_id3: patient_id3, doctor_id3: doctor_id3, report_name3: report_name3, report_instruction3: report_instruction3},
                        function (data) {
                            $('#results3').html(data);
                            $('#form3')[0].reset();
                        });
            }

        </script>
    </head>
    <body class="animsition">
        <div class="page-wrapper">
            <?php require 'headermobile.php'; ?>
            <?php require 'setup.php'; ?>
            <?php require 'sidebar.php'; ?>
            <div class="page-container">
                <?php require 'header.php'; ?>
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h1><b style="color: teal;">Patient Treatment</b></h1>
                                    </div>
                                </div>
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
                                            <a href="secretkey.php">Patient Details</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Patient Treatments
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <div class="card mb-3">
                                        <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src='<?php echo $patient_profile_image; ?>' width="210" height="210">
                                            <div align="left">
                                                <div><b>Name</b> : <?php echo $patient_fname . " " . $patient_lname; ?></div>
                                                <div><b>Phone No.</b> :<?php echo $patient_phoneno; ?></div>
                                                <div><b>Age : </b><?php echo $patient_age; ?></div>
                                                <div><b>Address : </b><?php echo $patient_address; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h4 class="text-primary font-weight-bold m-0">Previous Treatments</h4>
                                        </div>
                                        <div class="card-body" style="overflow-y: scroll; height: 745px;">
                                            <?php include "previous_treatments.php"; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card shadow mb-3">
                                                <div class="card-header py-3">
                                                    <h3 class="text-primary m-0 font-weight-bold">Treatment</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form1">
                                                        <div class="form-group">
                                                            <textarea id="communication" name="communication" rows="5" class="form-control" placeholder="Please enter the Treatment Process ..."></textarea>
                                                        </div>
                                                        <input type="hidden" id="patient_id" name="patient_id" value="<?php echo $patient_id; ?>"/>
                                                        <input type="hidden" id="doctor_id" name="doctor_id" value="<?php echo $id; ?>"/>
                                                        <?php
                                                        date_default_timezone_set('Asia/Kolkata');
                                                        $time_date = date("Y-m-d");
                                                        ?>
                                                        <input type="hidden" id="time_date" name="time_date" value="<?php echo $time_date; ?>"/>
                                                        <div class="form-group">
                                                            <input value="Submit" type="button" onclick="form1();" id="addcommunication" class="form-control btn btn-outline-primary col-lg-3"/>
                                                        </div>
                                                        <div id="results1"></div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card shadow">
                                                <div class="card-header py-3">
                                                    <h3 class="text-primary m-0 font-weight-bold">Prescribed Medicine</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form2">
                                                        <input type="hidden" id="patient_id2" name="patient_id" value="<?php echo $patient_id; ?>"/>
                                                        <input type="hidden" id="doctor_id2" name="doctor_id" value="<?php echo $id; ?>"/>
                                                        <div class="form-group">
                                                            <input type="text" id="medicine_name2" name="medicine_name" class="form-control" placeholder="Please enter the name of Medicine" />                                        		
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" id="quantity2" name="quantity" class="form-control" placeholder="Please enter the Quantity"/>	
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" id="medicine_per_day2" name="medicine_per_day" class="form-control" placeholder="Medicine Per Day" />	
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" id="medicine_course_duration2" name="medicine_course_duration" class="form-control" placeholder="Please enter the Course Duration" />                                        		
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="medicine_instruction" id="medicine_instruction2" class="form-control" rows="5" placeholder="Please enter the Instructions..."></textarea>                                        		
                                                        </div>
                                                        <div class="form-group">
                                                            <input value="Submit" type="button" onclick="form2();" id="addmedicines" class="form-control btn btn-outline-primary col-lg-3"/>
                                                        </div>
                                                        <div id="results2"></div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card shadow">
                                                <div class="card-header py-3">
                                                    <h3 class="text-primary m-0 font-weight-bold">Prescribed Medical Reports</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form3">
                                                        <input type="hidden" id="patient_id3" name="patient_id" value="<?php echo $patient_id; ?>"/>
                                                        <input type="hidden" id="doctor_id3" name="doctor_id" value="<?php echo $id; ?>"/>
                                                        <div class="form-group">
                                                            <input type="text" id="report_name3" name="report_name" class="form-control" placeholder="Please enter the name of Report" />                                        		
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea id="report_instruction3" name="report_instruction" class="form-control" rows="5" placeholder="Please enter the Instructions..."></textarea>                                        		
                                                        </div>
                                                        <div class="form-group">
                                                            <input value="Submit" type="button" onclick="form3();" id="addmedicalreport" class="form-control btn btn-outline-primary col-lg-3"/>
                                                        </div>
                                                        <div id="results3"></div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <a href="medicinhistory.php" class="btn btn-primary btn-block">
                                                            Patient Medicine History
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a href="reporthistory.php" class="btn btn-primary btn-block">
                                                            Patient Report History
                                                        </a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h3 class="text-primary m-0 font-weight-bold">Complete Transaction</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <a href="completetreatment.php">
                                            <button class="form-control col-lg-12 btn btn-outline-danger">Complete Treatment</button>
                                        </a>
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