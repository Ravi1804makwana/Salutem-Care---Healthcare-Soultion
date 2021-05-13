<?php

include '../dbconnect.php';

$patient_id = $_SESSION['patient']->patient_id;
$sql = "SELECT * FROM doctor_communication_history AS dch JOIN doctor AS d ON dch.doctor_id=d.doctor_id  WHERE patient_id='$patient_id' ORDER By id DESC";

$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $time_date = $row['time_date'];
    $communication = $row['communication'];
    $doctor_id = $row['doctor_id'];
    $doctor_name = $row['doctor_name'];
    
    echo"<h3>" . $doctor_name . "</h3>";
    echo "<hr/>";
    echo "<h6>" . $time_date . "</h6>";
    echo "<p>" . $communication . "</p><hr style='background-color: red;'/>";
}
?>