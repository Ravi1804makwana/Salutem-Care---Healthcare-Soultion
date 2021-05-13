<?php

require_once('../dbconnect.php');
require_once('../users/patient.php');
require_once('../users/doctor.php');
require_once('../users/medicalshop.php');
require_once('../users/laboratory.php');

require '../vendor/autoload.php';
session_start();

require 'setup.php';

		/**use Aws\S3\S3Client;
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
	        die("Error: " . $e->getMessage());
	    }
**/

$c = 1;
$pid = $_POST['id'];
for($i=0;$i<count($pid); $i++)
{
	if((isset($_FILES['file']['name'][$i])==1)?(true):(false))
	{
		$dirpath = "reports/";
	    $fileName = $dirpath . basename($_FILES['file']['name'][$i]);
	    $fileTemp = $_FILES['file']['tmp_name'][$i];
	    $msg = "";
	    $c = 1;
	    if ($c == 1 && file_exists($fileName)) 
	    {
	        $c = 0;
	    	$msg .= "File is already exist<br/>";
    	}
    	if ($c == 1) 
    	{
        	if (move_uploaded_file($fileTemp, $fileName)) $c = 1;
        	else $c = 0;
    	}
		if ($c == 1)
		{		
			$sql = "SELECT * FROM medical_report_list WHERE id = ".$pid[$i];
			$row = mysqli_fetch_array(mysqli_query($con, $sql));
	
			$patient_id = $row['patient_id'];
			$report_name = $row['report_name'];
			$report_instruction = $row['report_instruction'];
			date_default_timezone_set('Asia/Kolkata');
			$time_date = date("Y-m-d");
    
   			$part = explode('.', $fileName);    
    		rename($fileName, $part[0].time().'.'.$part[1]);
    		$fileName = $part[0].time().'.'.$part[1];
			$sql1 = "INSERT INTO medical_report_history (patient_id, laboratory_id, report_name, report_instruction, report_document, time_date) VALUES ('$patient_id', '$id', '$report_name', '$report_instruction', '$fileName', '$time_date')";
	
			$rs = mysqli_query($con, $sql1);
			if($rs) $c=1;
			else $c=0;

			$sql = "DELETE FROM medical_report_list WHERE id = ".$pid[$i];
			$rs = mysqli_query($con, $sql);
			if($rs) $c=1;
			else $c=0;
		}
    	else $c=0;	
	}
}
if($c==1)
	header("Location: completetreatment.php");
else
	header("Location: processmedicalreports.php");
?>