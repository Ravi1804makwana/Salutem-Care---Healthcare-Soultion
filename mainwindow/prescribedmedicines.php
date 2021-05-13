<?php

require_once('../dbconnect.php');
require_once('../users/patient.php');
require_once('../users/doctor.php');
require_once('../users/medicalshop.php');
require_once('../users/laboratory.php');

session_start();

require_once('setup.php');

$message="";

$mid = $_POST['id'];

date_default_timezone_set('Asia/Kolkata');
$time_date = date("Y-m-d");

for ($i=0; $i <count($mid) ; $i++) { 

	$sql = "SELECT * FROM medicine_list WHERE id = '$mid[$i]'";
	$row = mysqli_fetch_array(mysqli_query($con, $sql));

	$patient_id = $row['patient_id'];
	$medicine_per_day = $row['medicine_per_day'];
	$medicine_course_duration = $row['medicine_course_duration'];
	$quantity = $row['quantity'];
	$medicine_name = $row['medicine_name'];
	$medicine_instruction=$row['medicine_instruction'];
	$sql1="INSERT INTO medicine_history 
		(patient_id, 
		medical_shop_id, 
		medicine_per_day, 
		medicine_course_duration, 
		medicine_instruction, 
		time_date, 
		quantity, 
		medicine_name) VALUES
		(
			'$patient_id',
			'$id',
			'$medicine_per_day',
			'$medicine_course_duration',
			'$medicine_instruction',
			'$time_date',
			'$quantity',
			'$medicine_name'
		)";
	
		$rs = mysqli_query($con, $sql1);
		if($rs)
			echo "Success<br/>";
		else 
			echo "error";
	
	$sql = "DELETE FROM medicine_list WHERE id = ".$mid[$i];
	$rs = mysqli_query($con, $sql); 	

	if($rs)
		echo "Success<br/>";
	else
		echo $rs->error_list;

	$message .=$row['medicine_name']."<br/>";
}

header("Location: completetreatment.php?message = $message");

?>