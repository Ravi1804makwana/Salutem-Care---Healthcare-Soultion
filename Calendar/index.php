<?php

	require_once('bdd.php');
	$doctor_id = $_GET['doctor_id'];
	$sql = "SELECT * FROM appointment WHERE doctor_id = '$doctor_id'";
	$events = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointments Schedules</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet' />

</head>

<body>
    <div class="container">
    	<div id="calendar" class="col-md-12">
    </div>

    	<?php

    		date_default_timezone_set('Asia/Kolkata');
    		function SplitTime($StartTime, $EndTime, $Duration){
			    $ReturnArray = array ();// Define output
			    $StartTime    = strtotime ($StartTime); //Get Timestamp
			    $EndTime      = strtotime ($EndTime); //Get Timestamp

			    $AddMins  = $Duration * 60;
			    $EndTime  = $EndTime - $AddMins;
			    while ($StartTime < $EndTime) //Run loop
			    {
			        $ReturnArray[] = date ("G:i", $StartTime);
			        $StartTime += $AddMins; //Endtime check
			    }
			    return $ReturnArray;
			}

    		$sql = "Select treatment_time, opening_time, closing_time, break_start_time, break_end_time from doctor where doctor_id = $doctor_id";
    		$doctor_info = mysqli_fetch_array(mysqli_query($con,$sql));

    		$treatment_time = $doctor_info['treatment_time'];
    		$opening_time = $doctor_info['opening_time'];
    		$closing_time = $doctor_info['closing_time'];
    		$break_start_time = $doctor_info['break_start_time'];
    		$break_end_time = $doctor_info['break_end_time'];
            
            $morning_time = array();
            $afternoon_time = array();
    		$morning_time = SplitTime($opening_time, $break_start_time, $treatment_time);
    		$afternoon_time = SplitTime($break_end_time, $closing_time, $treatment_time);
    	?>

		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
				<input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>"/>
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Book Appointment</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label" style="text-align: center;">Reason For Appointment</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Please enter the reason for appointment">
					  <input type="hidden" name="treatment_time" value="<?php echo $treatment_time; ?>">
					</div>
				  </div>
				  <div class="form-group">
				  	<label for="title" class="col-sm-2 control-label" style="text-align: center;">Appointment Time</label>
				  	<div class="col-sm-10">
					  	<select name="times" class="form-control">
					  		<?php
					  			for($i=0;$i<count($morning_time);$i++)
					  				echo "<option>".$morning_time[$i]."</option>";
					  			for($i=0;$i<count($afternoon_time);$i++)
					  				echo "<option>".$afternoon_time[$i]."</option>";
					  		?>
					  	</select>
				  	</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label" style="text-align: center;">Appointment Date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.js'></script>
	<script src='js/fullcalendar/locale/en-us.js'></script>
	<script>

	$(document).ready(function() {

	   var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
		
		$('#calendar').fullCalendar({
			header: {
				language: 'en-us',
				left: 'prev,next',
				center: 'title',
				right: 'month,basicWeek,basicDay',

			},
			defaultDate: yyyy+"-"+mm+"-"+dd,
			editable: true,
			eventLimit: true, 
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('MMMM D,YYYY'));
				$('#ModalAdd #end').val(moment(end).format('MM D,YYYY'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['appointment_id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: 'red',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Evento se ha guardado correctamente');
					}else{
						alert('No se pudo guardar. Inténtalo de nuevo.'); 
					}
				}
			});
		}
		
	});
</script>
</body>
</html>
