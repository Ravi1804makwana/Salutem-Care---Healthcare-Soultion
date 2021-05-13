<?php

	require '../dbconnect.php';
	require '../users/patient.php';
	require '../users/doctor.php';
	require '../users/medicalshop.php';
	require '../users/laboratory.php';
	require '../vendor/autoload.php';
    session_start();
	require 'setup.php';

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


    $fileName = $profile_image;
    $tmp = explode("/", $fileName);
    $keyName = $tmp[4]."/" . basename($_FILES["file"]['name']);
    $newpath = $tmp[0]."//".$tmp[2]."/".$tmp[3]."/".$keyName;
    $deleteKey = $tmp[4]."/".$tmp[5];

    try {
        // Uploaded:
        $file = $_FILES["file"]['tmp_name'];

        $s3->putObject(
            array(
                'Bucket'=>$bucketName,
                'Key' =>  $keyName,
                'SourceFile' => $file,
                'StorageClass' => 'REDUCED_REDUNDANCY',
                'ACL' => 'public-read'

            )
        );	
    	$s3->deleteObject(
    		array(
    			'Bucket' => $bucketName,
        		'Key' => $deleteKey,
    		)
    	);
    } catch (S3Exception $e) {
        die('Error:' . $e->getMessage());
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
    
    if($grpid==1){
    	$sql = "UPDATE patient SET patient_profile_image = '$newpath' WHERE patient_id = '$id'";
    	mysqli_query($con, $sql);

    	$sql = "SELECT * FROM patient where patient_id='$id'";
		$data = mysqli_query($con, $sql) or die("");

		if (mysqli_num_rows($data)) {
    		while ($row = mysqli_fetch_array($data)) {
        		$patient = new Patient($row['secretkey'], $row['patient_id'], $row['patient_fname'], $row['patient_mname'], $row['patient_lname'], $row['patient_username'], $row['patient_password'], $row['patient_email'], $row['patient_phoneno'], $row['patient_address'], $row['patient_dateofbirth'], $row['patient_bloodgroup'], $row['patient_gender'], $row['patient_profile_image'], $row['grp_id']);

        			unset($_SESSION['uname']);
        			unset($_SESSION['grpid']);
        			unset($_SESSION['obj']);
        			$_SESSION['obj'] = $patient;
        			$_SESSION['uname'] = $row['patient_fname'] . " " . $row['patient_lname'];
        			$_SESSION['grpid'] = $row['grp_id'];
    			}
    		}

	    header("Location: patientprofile.php"); 
    }
	else if($grpid==2){
		$sql = "UPDATE doctor SET doctor_profile_image = '$newpath' WHERE doctor_id = '$id'";
		mysqli_query($con, $sql);

		$sql = "SELECT * FROM doctor where doctor_id='$id'";
		$data = mysqli_query($con, $sql) or die("");

		if (mysqli_num_rows($data)) {
		    while ($row = mysqli_fetch_array($data)) {
		         $doctor = new Doctor($row['doctor_id'], $row['doctor_name'], $row['username'], $row['password'], $row['doctor_email'], $row['doctor_phoneno'], $row['doctor_address'], $row['doctor_information'], $row['doctor_profile_image'], $row['grp_id'], $row["opening_time"], $row["closing_time"], $row["treatment_time"], $row["break_start_time"], $row["break_end_time"], $row["specialization"], $row["education"]);

		            unset($_SESSION['uname']);
		            unset($_SESSION['grpid']);
		            unset($_SESSION['obj']);

		            $_SESSION['obj'] = $doctor;
		            $_SESSION['uname'] = $row['doctor_name'];
		            $_SESSION['grpid'] = $row['grp_id'];
		    }
		}

		header("Location: doctorprofile.php");
	}
	else if($grpid==3){
		$sql = "UPDATE medical_shop SET medical_shop_profile_image = '$newpath' WHERE medical_shop_id = '$id'";
		mysqli_query($con, $sql);

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

		header("Location: medicalshopprofile.php");
	}
	else{
		$sql = "UPDATE laboratory SET laboratory_profile_image = '$newpath' WHERE laboratory_id = '$id'";
		mysqli_query($con, $sql);

		$sql = "SELECT * FROM laboratory where laboratory_id='$id'";
		$data = mysqli_query($con, $sql) or die("");

		if (mysqli_num_rows($data)) {
		    while ($row = mysqli_fetch_array($data)) {
		           
		           $laboratory = new Laboratory($row['laboratory_id'], $row['laboratory_name'], $row['username'], $row['password'], $row['laboratory_email'], $row['laboratory_phone'], $row['laboratory_address'], $row['laboratory_time_schedule'], $row['laboratory_profile_image'], $row['grp_id']);

		            unset($_SESSION['uname']);
		            unset($_SESSION['grpid']);
		            unset($_SESSION['obj']);

		            $_SESSION['obj'] = $laboratory;
		            $_SESSION['uname'] = $row['laboratory_name'];
		            $_SESSION['grpid'] = $row['grp_id'];
		            
		    }
		}
		
		header("Location: laboratoryprofile.php");
	}
    
 
?>