<?php
include '../dbconnect.php';
include '../users/patient.php';
include '../users/doctor.php';
include '../users/medicalshop.php';
include '../users/laboratory.php';
session_start();
if (!isset($_SESSION['uname'])) {
    header("Location:../login.php");
}

function getAge($date) {
    $dob = new DateTime($date);
    $now = new DateTime();
    $difference = $now->diff($dob);
    $age = $difference->y;
    return $age;
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
    	<title>Profile</title>
        <script src="../jquery.js"></script>
        <?php require 'css.php'; ?>
    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <?php require 'setup.php'; ?>
            <?php require 'headermobile.php'; ?>
            <?php require 'sidebar.php'; ?>
            <div class="page-container">
                <?php require 'header.php'; ?>
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h1><b style="color: teal;">Profile</b></h1>
                                    </div>
                                </div>
                            </div>
                            <br/>
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
                                            Profile
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <div class="card mb-3">
                                        <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src='<?php echo $profile_image; ?>' width="210" height="210">
                                            <p>
                                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                    Change Profile
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapseExample">
                                                <div class="card card-body">
                                                    <form method="post" action="changeimage.php" enctype="multipart/form-data">
                                                        <input type="file" name="file" class="form-control"/><br/>
                                                        <input type="submit" name="submit" value="Upload" class="btn btn-success"/><br/>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card shadow mb-3">
                                                <div class="card-header py-3">
                                                    <h3 class="text-primary m-0 font-weight-bold">Secret Key</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form1" action="changekey.php" method="post">
                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <input type="text" disabled="disabled" name="secretkey" value="<?php echo $secretkey; ?>" class="form-control"/>
                                                                <input type="hidden" name="patient_id" value="<?php echo $id; ?>"/>
                                                            </div>
                                                           <!--  <div class="form-group">
                                                                <input value="Change Key" type="submit" class="form-control btn btn-outline-primary"/>
                                                            </div> -->
                                                        </div>
                                                        <?php
                                                        if (isset($_GET['key'])) {
                                                            $message = $_GET['key'];
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <strong><?php echo $message; ?></strong>.
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card shadow mb-3">
                                                <div class="card-header py-3">
                                                    <h3 class="text-primary m-0 font-weight-bold">Personal Information</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form1" action="personalinfoupdate.php" method="post">
                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <strong>Firstname</strong><br>
                                                                <input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control"/>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <strong>Middlename</strong><br>
                                                                <input type="text" name="mname" value="<?php echo $mname; ?>" class="form-control"/>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <strong>Lastname</strong><br>
                                                                <input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <strong>Username</strong><br>
                                                                <input type="text" name="username" value="<?php echo $username; ?>" class="form-control"/>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <strong>Password</strong><br>
                                                                <input type="password" name="password" value="<?php echo $password; ?>" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input value="Save Updates" type="submit" class="form-control btn btn-outline-primary"/>
                                                        </div>
                                                        <?php
                                                        if (isset($_GET['personal'])) {
                                                            $message = $_GET['personal'];
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <strong><?php echo $message; ?></strong>.
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <h3 class="text-primary m-0 font-weight-bold">Contact Information</h3>
                                </div>
                                <div class="card-body">
                                    <form action="updatecontactinfo.php" method="post">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <strong>Email Address</strong><br>
                                                <input type="email" name="email" value="<?php echo $email; ?>" class="form-control"/>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <strong>Phone Number</strong><br>
                                                <input type="number" name="phoneno" value="<?php echo $phoneno; ?>" class="form-control"/>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <strong>Address</strong><br>
                                                <textarea name="address" rows="5" class="form-control"><?php echo $address; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input value="Save Updates" type="submit" onclick="form1();" class="form-control btn btn-outline-primary"/>
                                        </div>
                                        <?php
                                        if (isset($_GET['contact'])) {
                                            $message = $_GET['contact'];
                                            ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong><?php echo $message; ?></strong>.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'js.php'; ?>
    </body>
</html>
<!-- end document-->