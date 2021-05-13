<?php

include '../../dbconnect.php';
include '../../users/laboratory.php';
session_start();
include '../setup.php';

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$message;
$sql = "UPDATE laboratory SET
		laboratory_name='$name',
		username='$username',
		password='$password'
		WHERE laboratory_id='$id'";

if (mysqli_query($con, $sql))
    $message = "Successfully changes";
else
    $message = "Failed ...";

$sql = "SELECT * FROM laboratory where laboratory_id='$id'";
$data = mysqli_query($con, $sql) or die("");

if (mysqli_num_rows($data)) {
    while ($row = mysqli_fetch_array($data)) {
           
           $laboratory = new Laboratory($row['laboratory_id'], $row['laboratory_name'], $row['username'], $row['password'], $row['laboratory_email'], $row['laboratory_phone'], $row['laboratory_address'], $row['laboratory_time_schedule'], $row['laboratory_profile_image'], $row['grp_id']);

            unset($_SESSION['uname']);
            unset($_SESSION['grpid']);
            unset($_SESSION['obj']);

            $_SESSION['obj'] = $laboratory;
            $_SESSION['uname'] = $row['laboratory_name'];
            $_SESSION['grpid'] = $row['grp_id'];
            
    }
}
header("Location: ../laboratoryprofile.php?personal=$message");
?>