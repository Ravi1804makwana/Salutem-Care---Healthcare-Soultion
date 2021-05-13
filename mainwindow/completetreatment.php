<?php

session_start();
unset($_SESSION['patient']);
header("Location: successfultransaction.php");

?>