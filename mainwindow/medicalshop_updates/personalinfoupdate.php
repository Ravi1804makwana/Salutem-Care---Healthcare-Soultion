<?php

include '../../dbconnect.php';
include '../../users/medicalshop.php';
session_start();
include '../setup.php';

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$message;
$sql = "UPDATE medical_shop SET
		medical_shop_name='$name',
		username='$username',
		password='$password'
		WHERE medical_shop_id='$id'";

if (mysqli_query($con, $sql))
    $message = "Successfully changes";
else
    $message = "Failed ...";

$sql = "SELECT * FROM medical_shop where medical_shop_id='$id'";
$data = mysqli_query($con, $sql) or die("");

if (mysqli_num_rows($data)) {
    while ($row = mysqli_fetch_array($data)) {
          $medicalShop = new MedicalShop($row['medical_shop_id'], $row['medical_shop_name'], $row['username'], $row['password'], $row['medical_shop_email'], $row['medical_shop_phoneno'], $row['medical_shop_address'], $row['medical_shop_time_schedule'], $row['medical_shop_profile_image'], $row['grp_id']);

            unset($_SESSION['uname']);
            unset($_SESSION['grpid']);
            unset($_SESSION['obj']);

            $_SESSION['obj'] = $medicalShop;
            $_SESSION['uname'] = $row['medical_shop_name'];
            $_SESSION['grpid'] = $row['grp_id'];
    }
}
header("Location: ../medicalshopprofile.php?personal=$message");
?>