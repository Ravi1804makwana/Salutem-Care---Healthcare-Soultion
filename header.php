<?php
    session_start();
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
        <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
        <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
        <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
        <link rel="stylesheet" href="assets/css/linearicons.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="preloader">
            <div class="spinner"></div>
        </div>
        <header class="header-area">
            <div id="header" id="home" style="background: #f9f9fd; top:0px;">
                <div class="container">
                    <div class="row align-items-center justify-content-between d-flex">
                        <div id="logo">
                            <a href="index.php"><img src="assets/images/logo/logo.png"/></a>
                        </div>
                        <nav id="nav-menu-container">
                            <ul class="nav-menu">
                                <li class="menu-active"><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <?php 
                                    if (isset($_SESSION['uname'])) {
                                        echo '
                                            <li><a href="doctors.php">Appointments</a></li>
                                            <li><a href="mainwindow/dashboard.php">Dashboard</a></li>
                                        ';  
                                    }
                                    else{
                                        echo '
                                            <li><a href="signup.php">Sign Up</a></li>
                                            <li><a href="login.php">Login</a></li>
                                        ';
                                    }
                                ?>
                            </ul>
                        </nav>                  
                    </div>
                    <script type="text/javascript" src="jquery.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function(){
                        setInterval(function(){ $('#result').load("incomingcalls.php"); }, 20000)
                      });
                    </script>
                    <div id="result"></div>
                </div>
            </div>
        </header>
    </body>
</html>