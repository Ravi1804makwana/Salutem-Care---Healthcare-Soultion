<?php

require ('dbconnect.php');
require ('users/patient.php');
require ('users/doctor.php');
session_start();	
require ('mainwindow/setup.php');

if(!isset($id))
	header("Location: login.php");
$caller_id = $id; 
$receiver_id = $_GET['doctor_id']; 

$characters = '0123456789';
$code = '#';

for ($i = 0; $i < 6; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $code .= $characters[$index];
}

$sql = "INSERT INTO online_consultation (caller_id, receiver_id, code) VALUES ('$caller_id','$receiver_id','$code')";
mysqli_query($con, $sql);
header("Location: video/$code");

?>