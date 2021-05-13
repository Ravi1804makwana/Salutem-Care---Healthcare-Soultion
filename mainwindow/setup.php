<?php

$secretkey;
$id;
$name;
$fname;
$mname;
$lname;
$username;
$password;
$email;
$phoneno;
$address;
$dateofbirth;
$bloodgroup;
$gender;
$profile_image;
$grpid;
$information;
$time_schedule;

$break_start_time;
$break_end_time;
$opening_time;
$closing_time;
$treatment_time;
$education;
$specialization;

$obj = $_SESSION['obj'];

if ($_SESSION['grpid'] == 1) {

    $secretkey = $obj->secretkey;
    $id = $obj->patient_id;
    $fname = $obj->patient_fname;
    $mname = $obj->patient_mname;
    $lname = $obj->patient_lname;
    $username = $obj->patient_username;
    $password = $obj->patient_password;
    $email = $obj->patient_email;
    $phoneno = $obj->patient_phoneno;
    $address = $obj->patient_address;
    $dateofbirth = $obj->patient_dateofbirth;
    $bloodgroup = $obj->patient_bloodgroup;
    $gender = $obj->patient_gender;
    $profile_image = $obj->patient_profile_image;
    $grpid = $obj->grp_id;
    $name = $fname . " " . $lname;
} elseif ($_SESSION['grpid'] == 2) {
    $id = $obj->doctor_id;
    $name = $obj->doctor_name;
    $username = $obj->username;
    $password = $obj->password;
    $email = $obj->doctor_email;
    $phoneno = $obj->doctor_phoneno;
    $address = $obj->doctor_address;
    $profile_image = $obj->doctor_profile_image;
    $grpid = $obj->grp_id;
    $information = $obj->doctor_information;
    $break_start_time = $obj->break_start_time;
    $break_end_time = $obj->break_end_time;
    $opening_time = $obj->opening_time;
    $closing_time = $obj->closing_time;
    $treatment_time = $obj->treatment_time;
    $education = $obj->education;
    $specialization = $obj->specialization;
} elseif ($_SESSION['grpid'] == 3) {
    $id = $obj->medical_shop_id;
    $name = $obj->medical_shop_name;
    $username = $obj->username;
    $password = $obj->password;
    $email = $obj->medical_shop_email;
    $phoneno = $obj->medical_shop_phoneno;
    $address = $obj->medical_shop_address;
    $time_schedule = $obj->medical_shop_time_schedule;
    $profile_image = $obj->medical_shop_profile_image;
    $grpid = $obj->grp_id;
} elseif ($_SESSION['grpid'] == 4) {

    $id = $obj->laboratory_id;
    $name = $obj->laboratory_name;
    $username = $obj->username;
    $password = $obj->password;
    $email = $obj->laboratory_email;
    $phoneno = $obj->laboratory_phoneno;
    $address = $obj->laboratory_address;
    $time_schedule = $obj->laboratory_time_schedule;
    $profile_image = $obj->laboratory_profile_image;
    $grpid = $obj->grp_id;
}
?>