<?php
	
	require_once('bdd.php');
	require '../users/patient.php';
	session_start();

	$title = $_POST['title'];
	$date = $_POST['start'];
	$time = $_POST['times'];
	$treatment_time = $_POST['treatment_time'];

	$patient_id = $_SESSION['obj']->patient_id;
	$doctor_id = $_POST['doctor_id'];

	$start = date('Y-m-d H:i:s',strtotime($date." ".$time));
	$end = date('Y-m-d H:i:s',strtotime($date." ".date('H:i:s',strtotime("+".$treatment_time." minutes",strtotime($time)))));

	$sql = "INSERT INTO appointment (patient_id, doctor_id, title, start, end) VALUES ('$patient_id', '$doctor_id', '$title', '$start', '$end')";

	mysqli_query($con, $sql);
	header('Location: '.$_SERVER['HTTP_REFERER']);	
?>
