<?php
	require_once('dbconnect.php');
	require_once('users/patient.php');
	session_start();
	
	$patient_id =  $_SESSION['obj']->patient_id;
	$doctor_id = $_POST["doctor_id"];
	$date = $_POST["date"];
	$reason = $_POST["message"];

	//Get Doctor Opening and closing time
	$sql = "SELECT opening_time, closing_time, treatment_time From doctor WHERE doctor_id = '$doctor_id'";
	$rs = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($rs);

	$opening_time = $row['opening_time'];
	$closing_time = $row['closing_time'];
	$treatment_time = $row['treatment_time'];

	//Find number of appointment in defined date
	$sql = "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND dates = '$date'";
	$rs = mysqli_query($con, $sql);
	$no = mysqli_num_rows($rs);
	date_default_timezone_set('Asia/Kolkata');

	$time1 = explode(":", $opening_time);
	$h1=$time1[0];
	$m1=$time1[1];
	$time2 = explode(":", $treatment_time);
	$h2=$time2[0];
	$m2=$time2[1];
	$time3 = explode(":", $closing_time);
	$h3=$time3[0];
	$m3=$time3[1];

	$hour=0;
	$minute=0;

	for($i=0;$i<$no;$i++)
	{
		$minute+=$m2;
		if($minute>=60)
		{
			$hour+=1;
			$minute-=60;
		}
	}

	$m1 += $minute;
	$h1+=$hour;
	if($m1>=60)
	{
		$h1+=1;
		$m1-=60;
	}

	$message = "Your appointment is not schedule<br/>Please Select other day for appointment.";

	if($h3>$h1)
	{
		$appointment_time = date('h:i:s',strtotime($h1.":".$m1.":00"));
		$message = "Your appointment is Successfully requested<br/>Date : ".$date."<br/>Time : ".$appointment_time;
		$sql = "INSERT INTO appointment (appointment_id, patient_id, doctor_id, reason, dates, time) VALUES (NULL, '$patient_id','$doctor_id','$reason','$date', '$appointment_time')";
		if(mysqli_query($con, $sql))
			header("Location: doctors.php?message=$message");
	}
	else
		header("Location: doctors.php?message=$message")
?>