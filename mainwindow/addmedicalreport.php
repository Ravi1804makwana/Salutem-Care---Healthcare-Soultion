<?php

include '../dbconnect.php';

$doctor_id = $_POST['doctor_id3'];
$patient_id = $_POST['patient_id3'];
$report_name = $_POST['report_name3'];
$report_instruction = $_POST['report_instruction3'];

$sql = "INSERT INTO medical_report_list (doctor_id,patient_id,report_name,report_instruction) VALUES('$doctor_id','$patient_id','$report_name','$report_instruction')";
if (mysqli_query($con, $sql))
    echo "Successfully Submitted.";
else
    echo "Some Errors.";
?>