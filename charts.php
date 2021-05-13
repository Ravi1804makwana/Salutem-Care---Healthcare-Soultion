<?php
 
include 'dbconnect.php';
$dataPoints = array();
$sql = "SELECT quantity, time_date from medicine_history";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result))
{
    $date = date_format(date_create($row['time_date']), "M d, Y");
    array_push($dataPoints, array("y" => $row['quantity'], "label" => $date ));

}
    
?>
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Gold Reserves"
    },
    axisY: {
        title: "Gold Reserves (in tonnes)"
    },
    data: [{
        type: "column",
        yValueFormatString: "#,##0.## tonnes",
        xValueType: "dateTime",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>  