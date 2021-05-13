<?php
require_once('../dbconnect.php');
require_once('../users/patient.php');
require_once('../users/doctor.php');
require_once('../users/medicalshop.php');
require_once('../users/laboratory.php');

session_start();
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
$patient_gender = $_SESSION['patient']->patient_gender;
$patient_email = $_SESSION['patient']->patient_email;
$patient_phoneno = $_SESSION['patient']->patient_phoneno;
$patient_profile_image = $_SESSION['patient']->patient_profile_image;
$patient_address = $_SESSION['patient']->patient_address;
$patient_bloodgroup = $_SESSION['patient']->patient_bloodgroup;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Process Medical Reports</title>
        <?php require 'css.php'; ?>
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
                                        <h1><b style="color: teal;">Process Medical Reports</b></h1>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="secretkey.php">Patient Details</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Process Medical Reports
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-body text-left shadow">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <img class="rounded-circle mb-3 mt-4" src='<?php echo $patient_profile_image; ?>' width="210" height="210">
                                                </div>
                                                <div class="col-lg-8">
                                                    <table class="table">
                                                        <tr>
                                                            <td>
                                                                Fullname
                                                            </td>
                                                            <td>
                                                                <?php echo $patient_fname . " " . $patient_mname . " " . $patient_lname; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Phone No.
                                                            </td>
                                                            <td>
                                                                <?php echo $patient_phoneno; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Age
                                                            </td>
                                                            <td>
                                                                <?php echo $patient_age; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Gender
                                                            </td>
                                                            <td>
                                                                <?php 
                                                            if($patient_gender=='M')
                                                                echo "Male";
                                                            else
                                                                echo "Female";
                                                         ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Email
                                                            </td>
                                                            <td>
                                                                <?php echo $patient_email; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Address
                                                            </td>
                                                            <td>
                                                                <?php echo $patient_address; ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <!-- @Ravikumar -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="card shadow mb-3">
                                                <div class="card-header py-3">
                                                    <h3 class="text-primary m-0 font-weight-bold">Process Reports</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action="storemedicalreports.php" method="post" enctype="multipart/form-data">
                                                        <?php
                                                        $sql = "SELECT d.doctor_name, mrl.report_name, mrl.id FROM medical_report_list AS mrl JOIN doctor AS d ON mrl.doctor_id=d.doctor_id WHERE patient_id= $patient_id";
                                                        $rs = mysqli_query($con, $sql);
                                                        ?>
                                                        <div style="overflow-x: auto;">
                                                        <table class="table table-borderless table-striped table-earning">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr No.</th>
                                                                    <th>Doctor Name</th>
                                                                    <th>Report Name</th>
                                                                    <th>Upload</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                        <?php
                                                        if($rs -> num_rows !=0)
                                                        {
                                                            $counter=1;
                                                            while ($row = mysqli_fetch_array($rs)) {
                                                               
                                                               echo "<tr>";
                                                               
                                                               echo "<td>";
                                                               echo $counter ++;
                                                               echo "</td>";

                                                               echo "<td>";
                                                               echo $row['doctor_name']; 
                                                               echo "</td>";
                                                            
                                                               echo "<td>";
                                                               echo $row["report_name"];
                                                               echo "</td>";

                                                               echo "<td>";
                                                               echo "<input type = 'file' name='file[]' class = 'form-control'>";
                                                               echo "</td>";

                                                               echo "<input type='hidden' value='".$row['id']."' name = 'id[]'/>";                                                               

                                                               echo "</tr>";
                                                            }
                                                        }
                                                        ?> </tbody>
                                                        </table>
                                                    </div>
                                                        <br/>
                                                        <input type="submit" name="submit" value="Complete Transactions" class="btn btn-primary">
                                                    </form>
                                                </div>
                                            </div>
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