<?php
    include '../dbconnect.php';
    include '../users/patient.php';
    include '../users/doctor.php';
    include '../users/medicalshop.php';
    include '../users/laboratory.php';
    session_start();

    if(!isset($_SESSION['uname'])){
        header("Location:../login.php");
    }    
    $obj = $_SESSION['obj'];
    
    require 'setup.php';
?>
<!DOCTYPE html>
<html>
<head>
    <?php require 'css.php';?>
</head>
<body>
	    <div class="page-wrapper">
        <?php require 'headermobile.php';?>
        <?php require 'sidebar.php';?>
        <div class="page-container">
        <?php require 'header.php';?>
        <?php require 'js.php';?>        
</body>
</html>