<?php

require ('dbconnect.php');
require ('users/patient.php');
require ('users/doctor.php');
require ('users/laboratory.php');
require ('users/medicalshop.php');
session_start();
if(isset($_SESSION['obj']))
{
	if($_SESSION['obj']->grp_id==2)
	{
		$receiver_id = $_SESSION['obj']->doctor_id;

		$sql = "SELECT * FROM online_consultation WHERE receiver_id = '$receiver_id'";

		$rs = mysqli_query($con, $sql);
		if(mysqli_num_rows($rs)!=0)
		{
			$row = mysqli_fetch_array($rs);
			$code = $row['code'];

			$url = "video/".$code;
			$sql1 = "DELETE FROM online_consultation WHERE receiver_id = '$receiver_id'";
			mysqli_query($con, $sql1);
			
			?>
			<div class="alert alert-danger" role="alert">
				<strong style="font-size: 20px;" class="badge badge-success">
					<a style="text-transform: none;color: white;" href="<?php echo $url; ?>">Accept Call</a>
				</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php
		}
	}
}
?>