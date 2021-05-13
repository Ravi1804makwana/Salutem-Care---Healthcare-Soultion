<?php

session_start();

include 'dbconnect.php';
include 'users/patient.php';
include 'users/doctor.php';
include 'users/medicalshop.php';
include 'users/laboratory.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['grp_id'];

if ($role == "1") {

    $sql = "SELECT * FROM patient where patient_username='$username' AND patient_password='$password'";
    $data = mysqli_query($con, $sql) or die("");

    if (mysqli_num_rows($data)) {

    $row = mysqli_fetch_array($data);
    $patient = new Patient($row['secretkey'], $row['patient_id'], $row['patient_fname'], $row['patient_mname'], $row['patient_lname'], $row['patient_username'], $row['patient_password'], $row['patient_email'], $row['patient_phoneno'], $row['patient_address'], $row['patient_dateofbirth'], $row['patient_bloodgroup'], $row['patient_gender'], $row['patient_profile_image'], $row['grp_id']);

    $_SESSION['obj'] = $patient;
    $_SESSION['uname'] = $row['patient_fname'] . " " . $row['patient_lname'];
    $_SESSION['grpid'] = $_POST['grp_id'];
    header("Location:mainwindow/dashboard.php");
    
    }
    else
        header("Location:login.php?login=Login Failed!");
}
else if ($role == "2") {
    $sql = "SELECT * FROM doctor where username='$username' AND password='$password'";
    $data = mysqli_query($con, $sql) or die("");

    if (mysqli_num_rows($data)) 
    {
        $row = mysqli_fetch_array($data);
        $doctor = new Doctor($row['doctor_id'], $row['doctor_name'], $row['username'], $row['password'], $row['doctor_email'], $row['doctor_phoneno'], $row['doctor_address'], $row['doctor_information'], $row['doctor_profile_image'], $row['grp_id'], $row['opening_time'], $row['closing_time'], $row['treatment_time'], $row['break_start_time'], $row['break_end_time'], $row['specialization'], $row['education']);
        $_SESSION['obj'] = $doctor;
        $_SESSION['uname'] = $row['patient_fname'] . " " . $row['patient_lname'];
        $_SESSION['grpid'] = $_POST['grp_id'];

        header("Location:mainwindow/dashboard.php");
    }
    else
        header("Location:login.php?login=Login Failed!");
}
else if ($role == "4")
{
    $sql = "SELECT * FROM laboratory where username='$username' AND password='$password'";
    $data = mysqli_query($con, $sql) or die("");

    if (mysqli_num_rows($data))
    {
        $row = mysqli_fetch_array($data);
        $laboratory = new Laboratory($row['laboratory_id'], $row['laboratory_name'], $row['username'], $row['password'], $row['laboratory_email'], $row['laboratory_phone'], $row['laboratory_address'], $row['laboratory_time_schedule'], $row['laboratory_profile_image'], $row['grp_id']);
        $_SESSION['obj'] = $laboratory;
        $_SESSION['uname'] = $row['patient_fname'] . " " . $row['patient_lname'];
        $_SESSION['grpid'] = $_POST['grp_id'];
        header("Location: mainwindow/dashboard.php");
    }
    else
        header("Location:login.php?login=Login Failed!");
}
else if ($role == "3") {
    $sql = "SELECT * FROM medical_shop where username='$username' AND password='$password'";
    $data = mysqli_query($con, $sql) or die("");

    if (mysqli_num_rows($data)) {
        $row = mysqli_fetch_array($data);
        $medicalShop = new MedicalShop($row['medical_shop_id'], $row['medical_shop_name'], $row['username'], $row['password'], $row['medical_shop_email'], $row['medical_shop_phoneno'], $row['medical_shop_address'], $row['medical_shop_time_schedule'], $row['medical_shop_profile_image'], $row['grp_id']);
        
        $_SESSION['obj'] = $medicalShop;
        $_SESSION['uname'] = $row['patient_fname'] . " " . $row['patient_lname'];
        $_SESSION['grpid'] = $_POST['grp_id'];
        header("Location:mainwindow/dashboard.php");
    }
    else
        header("Location:login.php?login=Login Failed");
} else
    header("Location:login.php?login=Please select your role.");
?>