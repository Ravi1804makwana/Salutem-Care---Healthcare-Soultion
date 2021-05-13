<?php

include '../dbconnect.php';
include '../users/patient.php';
include '../users/doctor.php';
include '../users/medicalshop.php';
include '../users/laboratory.php';
session_start();
require 'setup.php';
$secretkey = $_POST['secretkey'];
$sql = "Select * from patient where secretkey='$secretkey'";

$data = mysqli_query($con, $sql) or die("");

if (mysqli_num_rows($data)!=0) {
    
        $row = mysqli_fetch_array($data);
        $patient = new Patient($row['secretkey'], $row['patient_id'], $row['patient_fname'], $row['patient_mname'], $row['patient_lname'], $row['patient_username'], $row['patient_password'], $row['patient_email'], $row['patient_phoneno'], $row['patient_address'], $row['patient_dateofbirth'], $row['patient_bloodgroup'], $row['patient_gender'], $row['patient_profile_image'], $row['grp_id']);

        $_SESSION['patient'] = $patient;

    if( $grpid == 2 )
		header("Location: patientcheckup.php");
	else if( $grpid == 3 )
		header("Location: processmedicines.php");
	else if( $grpid == 4 )
		header("Location: processmedicalreports.php");
}
else
	header("Location: secretkey.php");
?>