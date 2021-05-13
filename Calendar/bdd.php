<?php

	$dbname="CgakoqyBSR";
	$hostname="remotemysql.com";
	$username="CgakoqyBSR";
	$password="mRS48ze153";
	$con=new mysqli($hostname,$username,$password,$dbname);
	if($con->connect_errno)
		echo "Connection Failed .";
?>