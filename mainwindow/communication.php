<?php

include '../dbconnect.php';

$doctor_id = $_POST['doctor_id'];
$patient_id = $_POST['patient_id'];
$communication = $_POST['communication'];
$time_date = $_POST['time_date'];

$sql = "Insert into doctor_communication_history (doctor_id,patient_id,communication,time_date) values('$doctor_id','$patient_id','$communication','$time_date')";
if (mysqli_query($con, $sql))
    echo "Successfully Submitted.";
else
    echo "Some Errors.";
?>