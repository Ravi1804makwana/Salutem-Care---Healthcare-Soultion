<?php

include '../dbconnect.php';
include '../users/patient.php';
session_start();
include 'setup.php';

$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = $_POST['password'];

$message;
$sql = "UPDATE patient SET
		patient_fname='$fname',
		patient_lname='$lname',
		patient_mname='$mname',
		patient_username='$username',
		patient_password='$password'
		WHERE patient_id='$id'";
if (mysqli_query($con, $sql))
    $message = "Successfully changes";
else
    $message = "Failed ...";

$sql = "SELECT * FROM patient where patient_id='$id'";
$data = mysqli_query($con, $sql) or die("");

if (mysqli_num_rows($data)) {
    while ($row = mysqli_fetch_array($data)) {
        $patient = new Patient($row['secretkey'], $row['patient_id'], $row['patient_fname'], $row['patient_mname'], $row['patient_lname'], $row['patient_username'], $row['patient_password'], $row['patient_email'], $row['patient_phoneno'], $row['patient_address'], $row['patient_dateofbirth'], $row['patient_bloodgroup'], $row['patient_gender'], $row['patient_profile_image'], $row['grp_id']);

        unset($_SESSION['uname']);
        unset($_SESSION['grpid']);
        unset($_SESSION['obj']);
        $_SESSION['obj'] = $patient;
        $_SESSION['uname'] = $row['patient_fname'] . " " . $row['patient_lname'];
        $_SESSION['grpid'] = $row['grp_id'];
    }
}
header("Location: patientprofile.php?personal=$message");
?>