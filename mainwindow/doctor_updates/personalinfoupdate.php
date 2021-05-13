<?php

include '../../dbconnect.php';
include '../../users/doctor.php';
session_start();
include '../setup.php';

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$message;
$sql = "UPDATE doctor SET
		doctor_name='$name',
		username='$username',
		password='$password'
		WHERE doctor_id='$id'";

if (mysqli_query($con, $sql))
    $message = "Successfully changes";
else
    $message = "Failed ...";

$sql = "SELECT * FROM doctor where doctor_id='$id'";
$data = mysqli_query($con, $sql) or die("");

if (mysqli_num_rows($data)) {
    while ($row = mysqli_fetch_array($data)) {
         $doctor = new Doctor($row['doctor_id'], $row['doctor_name'], $row['username'], $row['password'], $row['doctor_email'], $row['doctor_phoneno'], $row['doctor_address'], $row['doctor_information'], $row['doctor_profile_image'], $row['grp_id'], $row["opening_time"], $row["closing_time"], $row["treatment_time"], $row["break_start_time"], $row["break_end_time"], $row["specialization"], $row["education"]);

            unset($_SESSION['uname']);
            unset($_SESSION['grpid']);
            unset($_SESSION['obj']);

            $_SESSION['obj'] = $doctor;
            $_SESSION['uname'] = $row['doctor_name'];
            $_SESSION['grpid'] = $row['grp_id'];
    }
}
header("Location: ../doctorprofile.php?personal=$message");
?>