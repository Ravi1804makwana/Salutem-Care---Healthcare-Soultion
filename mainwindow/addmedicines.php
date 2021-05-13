<?php

include '../dbconnect.php';

$patient_id = $_POST['patient_id2'];
$quantity = $_POST['quantity2'];
$medicine_name = $_POST['medicine_name2'];
$medicine_per_day = $_POST['medicine_per_day2'];
$medicine_course_duration = $_POST['medicine_course_duration2'];
$medicine_instruction = $_POST['medicine_instruction2'];
$doctor_id = $_POST['doctor_id2'];

$sql = "INSERT INTO medicine_list (patient_id,quantity,medicine_name,medicine_per_day,medicine_course_duration,medicine_instruction,doctor_id) VALUES ('$patient_id', '$quantity','$medicine_name', '$medicine_per_day', '$medicine_course_duration','$medicine_instruction','$doctor_id')";
if (mysqli_query($con, $sql))
    echo "Successfully Submitted.";
else
    echo "Some Errors.";
?>