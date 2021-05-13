<?php
include '../dbconnect.php';
include '../users/patient.php';
include '../users/doctor.php';
include '../users/medicalshop.php';
include '../users/laboratory.php';
session_start();
if (!isset($_SESSION['uname'])) {
    header("Location:../login.php");
}
require 'setup.php';
if($grpid==1)
    header("Location: patientdashboard.php");
else if($grpid==2)
    header("Location: doctordashboard.php");
else if($grpid==3)
    header("Location: medicalshopdashboard.php");
else
    header("Location: laboratorydashboard.php");
?>