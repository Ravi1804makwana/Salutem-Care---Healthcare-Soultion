<?php
require_once('../dbconnect.php');
require_once('../users/patient.php');
require_once('../users/doctor.php');
require_once('../users/medicalshop.php');
require_once('../users/laboratory.php');

session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Transaction Successful !</title>
        <?php require 'css.php'; ?>
    </head>
    <body class="animsition">
        <?php require 'headermobile.php'; ?>
        <?php require 'setup.php'; ?>
        <?php require 'sidebar.php'; ?>
        <div class="page-wrapper">
            <div class="page-container">
                <?php require 'header.php'; ?>
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h1><b style="color: teal;">Transaction Successful</b></h1>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="../index.php">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="dashboard.php">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Transaction Successful
                                        </li>
                                    </ol>
                                </nav>
                            </div>                          
                        </div>
                        <div class="container">
                            <div class="container py-5 col-lg-6" align="center">
                                <h1 style="color: #e8204f; font-size: 150px;"><i class="fa fa-check-circle" aria-hidden="true"></i></h1>
                                <h2 style="color: green;">Successful Transactions !</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'js.php'; ?>
    </body>
</html>