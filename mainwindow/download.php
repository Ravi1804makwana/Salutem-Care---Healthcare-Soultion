<?php

    $file = $_REQUEST["file"];
	header('Content-Description: File Transfer');
	header('Content-Type: application/pdf');
	header('Content-Disposition: attachment; filename="'.$file.'"');
	header('Content-Length: ' . filesize($file));
	echo readfile($file);
?>