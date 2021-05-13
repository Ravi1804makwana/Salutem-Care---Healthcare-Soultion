<?php
session_start();
include 'dbconnect.php';
$category = $_POST["category"];
require 'vendor/autoload.php';
    
    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    // AWS Info
    $bucketName = 'salutemcare';
    $IAM_KEY = 'AKIA3IW3RM2UZIY2EB5Z';
    $IAM_SECRET = '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';

    // Connect to AWS
    try {
        // You may need to change the region. It will say in the URL when the bucket is open
        // and on creation.
        $s3 = S3Client::factory(
            array(
                'credentials' => array(
                    'key' => $IAM_KEY,
                    'secret' => $IAM_SECRET
                ),
                'version' => 'latest',
                'region'  => 'ap-south-1'
            )
        );
    } catch (Exception $e) {
        // We use a die, so if this fails. It stops here. Typically this is a REST call so this would
        // return a json object.
        die("Error: " . $e->getMessage());
    }


if ($category == 1) {

    function getKey() {
        $characters = '0123456789';
        $randomString = '';

        for ($i = 0; $i < 15; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    $patient_fname = $_POST['patient_fname'];
    $patient_mname = $_POST['patient_mname'];
    $patient_lname = $_POST['patient_lname'];
    $patient_username = $_POST['patient_username'];
    $patient_password = $_POST['patient_password'];
    $patient_email = $_POST['patient_email'];
    $patient_phoneno = $_POST['patient_phoneno'];
    $patient_address = $_POST['patient_address'];
    $patient_dateofbirth = $_POST['patient_dateofbirth'];
    $patient_bloodgroup = $_POST['patient_bloodgroup'];
    $patient_gender = $_POST['patient_gender'];

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

    $dirpath = "patient/";
    $keyName = $dirpath . basename($_FILES["patient_profile_image"]['name']);
    $pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;
    try {
        // Uploaded:
        $file = $_FILES["patient_profile_image"]['tmp_name'];

        $s3->putObject(
            array(
                'Bucket'=>$bucketName,
                'Key' =>  $keyName,
                'SourceFile' => $file,
                'StorageClass' => 'REDUCED_REDUNDANCY',
                'ACL' => 'public-read'

            )
        );

    } catch (S3Exception $e) {
        die('Error:' . $e->getMessage());
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }

    $sql = "INSERT INTO patient(secretkey, patient_username, patient_password, patient_fname, patient_mname, patient_lname, patient_email, patient_dateofbirth, patient_phoneno, patient_profile_image, patient_gender, patient_address, patient_bloodgroup,grp_id) VALUES ('$key','$patient_username','$patient_password','$patient_fname','$patient_mname','$patient_lname','$patient_email','$patient_dateofbirth','$patient_phoneno','$pathInS3','$patient_gender','$patient_address','$patient_bloodgroup','$category')";

        if (!mysqli_query($con, $sql))
            echo "Errors ..";
        else{
            $_SESSION['action'] = 'success';
            header("Location: login.php");
        }

}
elseif ($category == 2) {

    $doctor_name = $_POST['doctor_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $doctor_email = $_POST['doctor_email'];
    $doctor_phoneno = $_POST['doctor_phoneno'];
    $doctor_address = $_POST['doctor_address'];
    $doctor_information = $_POST['doctor_information'];
    $opening_time = $_POST['opening_time'];
    $closing_time = $_POST['closing_time'];
    $treatment_time = $_POST['treatment_time'];
    $break_start_time = $_POST['break_start_time'];
    $break_end_time = $_POST['break_end_time'];
    $specialization = $_POST['specialization'];
    $education = $_POST['education'];

    $dirpath = "doctor/";
    $keyName = $dirpath . basename($_FILES["doctor_profile_image"]['name']);
    $pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;
    try {
        // Uploaded:
        $file = $_FILES["doctor_profile_image"]['tmp_name'];

        $s3->putObject(
            array(
                'Bucket'=>$bucketName,
                'Key' =>  $keyName,
                'SourceFile' => $file,
                'StorageClass' => 'REDUCED_REDUNDANCY',
                'ACL' => 'public-read'

            )
        );

    } catch (S3Exception $e) {
        die('Error:' . $e->getMessage());
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }

    $sql = "INSERT INTO doctor(doctor_name, doctor_phoneno, doctor_email, doctor_address, doctor_profile_image, doctor_information, username, password, grp_id, opening_time, closing_time, treatment_time, break_start_time, break_end_time, specialization, education) VALUES ('$doctor_name','$doctor_phoneno','$doctor_email','$doctor_address','$pathInS3','$doctor_information','$username','$password','$category', '$opening_time', '$closing_time','$treatment_time','$break_start_time','$break_end_time', '$specialization', '$education')";
    if (!mysqli_query($con, $sql))
        echo "Errors.";
    else{
        $_SESSION['action'] = 'success';
        header("Location: login.php");
    }
}
elseif ($category == 3) {

    $medical_shop_name = $_POST['medical_shop_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $medical_shop_email = $_POST['medical_shop_email'];
    $medical_shop_phoneno = $_POST['medical_shop_phoneno'];
    $medical_shop_address = $_POST['medical_shop_address'];
    $laboratory_time_schedule_start = $_POST['medical_shop_time_schedule_start'];
    $laboratory_time_schedule_end = $_POST['medical_shop_time_schedule_end'];
    $time_schedule = $laboratory_time_schedule_start . " -- " . $laboratory_time_schedule_end;

    $dirpath = "medical_shop/";
    $keyName = $dirpath . basename($_FILES["medical_shop_profile_image"]['name']);
    $pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;
    try {
        // Uploaded:
        $file = $_FILES["medical_shop_profile_image"]['tmp_name'];

        $s3->putObject(
            array(
                'Bucket'=>$bucketName,
                'Key' =>  $keyName,
                'SourceFile' => $file,
                'StorageClass' => 'REDUCED_REDUNDANCY',
                'ACL' => 'public-read'

            )
        );

    } catch (S3Exception $e) {
        die('Error:' . $e->getMessage());
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }


    
    $sql = "INSERT INTO medical_shop(medical_shop_name, medical_shop_address, medical_shop_phoneno, medical_shop_email, medical_shop_profile_image, medical_shop_time_schedule, username, password, grp_id) VALUES ('$medical_shop_name','$medical_shop_address','$medical_shop_phoneno','$medical_shop_email','$pathInS3','$time_schedule','$username','$password','$category')";
        if (!mysqli_query($con, $sql))
            echo "Errors .";
        else{
            $_SESSION['action'] = 'success';
            header("Location: login.php");
        }
}
elseif ($category == 4) {

    $laboratory_name = $_POST['laboratory_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $laboratory_email = $_POST['laboratory_email'];
    $laboratory_phoneno = $_POST['laboratory_phoneno'];
    $laboratory_address = $_POST['laboratory_address'];
    $laboratory_time_schedule_start = $_POST['laboratory_time_schedule_start'];
    $laboratory_time_schedule_end = $_POST['laboratory_time_schedule_end'];
    $time_schedule = $laboratory_time_schedule_start . " -- " . $laboratory_time_schedule_end;

    $dirpath = "laboratory/";
    $keyName = $dirpath . basename($_FILES["laboratory_profile_image"]['name']);
    $pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;
    try {
        // Uploaded:
        $file = $_FILES["laboratory_profile_image"]['tmp_name'];

        $s3->putObject(
            array(
                'Bucket'=>$bucketName,
                'Key' =>  $keyName,
                'SourceFile' => $file,
                'StorageClass' => 'REDUCED_REDUNDANCY',
                'ACL' => 'public-read'

            )
        );

    } catch (S3Exception $e) {
        die('Error:' . $e->getMessage());
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }


    $sql = "INSERT INTO laboratory(laboratory_name, laboratory_address, laboratory_email, laboratory_phone, laboratory_profile_image, laboratory_time_schedule, username, password, grp_id) VALUES ('$laboratory_name','$laboratory_address','$laboratory_email','$laboratory_phoneno','$pathInS3','$time_schedule','$username','$password', '$category')";
        if (!mysqli_query($con, $sql))
            echo "Errors .";
        else{
            $_SESSION['action'] = 'success';
            header("Location: login.php");
        }
}
?>