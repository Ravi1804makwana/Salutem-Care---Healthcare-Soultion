<?php

include '../dbconnect.php';
include '../users/patient.php';
session_start();
include 'setup.php';
$patient_id = $id;

function getKey() {
    $characters = '0123456789';
    $randomString = '';

    for ($i = 0; $i < 15; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

$sql = "SELECT secretkey FROM patient";
$data = mysqli_query($con, $sql);

$key;
while (true) {

    $k = 0;
    $key = getKey();
    while ($row = mysqli_fetch_array($data)) {
        if ($key == $row['secretkey']) {
            $k = 1;
        }
    }
    if ($k == 0)
        break;
}
$message;
$sql = "UPDATE patient SET secretkey='$key' WHERE patient_id='$patient_id'";
if (mysqli_query($con, $sql))
    $message = "Successfully Secret key is changes";
else
    $message = "Failed ...";

$sql = "SELECT * FROM patient where patient_id='$patient_id'";
$data = mysqli_query($con, $sql) or die("");

if (mysqli_num_rows($data)) {
    while ($row = mysqli_fetch_array($data)) {
        $patient = new Patient($row['secretkey'], $row['patient_id'], $row['patient_fname'], $row['patient_mname'], $row['patient_lname'], $row['patient_username'], $row['patient_password'], $row['patient_email'], $row['patient_phoneno'], $row['patient_address'], $row['patient_dateofbirth'], $row['patient_bloodgroup'], $row['patient_gender'], $row['patient_profile_image'], $row['grp_id']);

        unset($_SESSION['obj']);
        unset($_SESSION['uname']);
        unset($_SESSION['grpid']);
        unset($_SESSION['obj']);
        $secretkey = $key;
        $_SESSION['obj'] = $patient;
        $_SESSION['uname'] = $row['patient_fname'] . " " . $row['patient_lname'];
        $_SESSION['grpid'] = $row['grp_id'];
    }
}
header("Location: patientprofile.php?key=$message");
?>