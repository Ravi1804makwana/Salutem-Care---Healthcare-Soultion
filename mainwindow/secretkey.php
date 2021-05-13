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
        <title>Enter Patient's Secret Key</title>
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
                                        <h1><b style="color: teal;">Enter Patient's Secret Key</b></h1>
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
                                            Enter the Secret key
                                        </li>
                                    </ol>
                                </nav>
                            </div>                          
                        </div>

                        <div class="container py-5 col-lg-6" align="center">
                            <form method="post" action="processsecretkey.php">
                                <div class="from-group">
                                    <strong>Patient's Secret Key</strong>
                                    <br/>
                                    <br/>
                                    <input type="text" name="secretkey" class="form-control col-lg-6" required placeholder="Secrek Key ..." />
                                </div>
                                <br/>
                                <div class="from-group">
                                    <input type="submit" name="submit" value="Submit" class="form-control btn btn-primary col-lg-6" />
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php require 'js.php'; ?>
    </body>
</html>