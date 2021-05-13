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
require 'setup.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Search Users</title>
    <?php require 'css.php'; ?>
    </head>
    <body class="animsition">
        <div class="page-wrapper">
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
                                        <h2 class="title-1" style="color: teal;"><b>Search Users</b></h2>
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
                                            Search Users
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="" method="post">
                                    <div class="row">
                                        <div class="form-group col-lg-3">
                                            <select class="form-control" name="grp_id">
                                                <option value="*">Select Category</option>
                                                <option value="2">Doctor</option>
                                                <option value="3">Medical Shop</option>
                                                <option value="4">Medical Laboratory</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <select class="form-control" name="searchby">
                                                <option value="*">Search By</option>
                                                <option value="name">Name</option>
                                                <option value="email">Email</option>
                                                <option value="address">Address</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <input type="text" name="searchtext" class="form-control"/>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <input type="submit" class="form-control btn btn-outline-success" value="Search" name="submit" />
                                        </div>
                                    </div>
                                    </form>
                                
<?php

if(isset($_POST['submit']))
{
    $grp_id = $_POST['grp_id'];
    $searchtext = $_POST['searchtext'];
    $searchby = $_POST['searchby'];

    if($grp_id==2)
    {
        if($searchby=="name")
            $searchby="doctor_name";
        else if($searchby=="email")
            $searchby="doctor_email";
        else
            $searchby="doctor_address";

        $sql="Select * from doctor where $searchby like '%$searchtext%'";
        $result=mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($result))
        {
            ?>
                                <div class="card shadow mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img src='<?php echo $data['doctor_profile_image']; ?>' width="210" height="210" style="border-radius: 20px;"/>
                                            </div>
                                            <div class="col-lg-8">
                                                <table class="table">
                                                    <tr><th>Name</th><td> <?php echo $data['doctor_name']; ?></td></tr>
                                                    <tr><th>Information</th> <td> <?php echo $data['doctor_information']; ?></td></tr>
                                                    <tr><th>Phone Number</th><td> <a href="tel:<?php echo $data['doctor_phoneno']; ?>"><?php echo $data['doctor_phoneno']; ?></a></td></tr>
                                                    <tr><th>Email</th><td> <a href="mailto:<?php echo $data['doctor_email']; ?>"><?php echo $data['doctor_email']; ?></a></td></tr>
                                                    <tr><th>Address</th><td> <?php echo $data['doctor_address']; ?></td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <?php
        }
    }
    else if($grp_id==3)
    {
        if($searchby=="name")
            $searchby="medical_shop_name";
        else if($searchby=="email")
            $searchby="medical_shop_email";
        else
            $searchby="medical_shop_address";

        $sql="Select * from medical_shop where $searchby like '%$searchtext%'";
        $result=mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($result))
        {
            ?>
                                <div class="card shadow mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img src='<?php echo $data['medical_shop_profile_image']; ?>' width="210" height="210" style="border-radius: 20px;"/>
                                            </div>
                                            <div class="col-lg-8">
                                                <table class="table">
                                                    <tr><th>Name</th><td> <?php echo $data['medical_shop_name']; ?></td></tr>
                                                    <tr><th>Phone Number</th><td> <a href="tel:<?php echo $data['medical_shop_phoneno']; ?>"><?php echo $data['medical_shop_phoneno']; ?></a></td></tr>
                                                    <tr><th>Email</th><td> <a href="mailto:<?php echo $data['medical_shop_email']; ?>"><?php echo $data['medical_shop_email']; ?></a></td></tr>
                                                    <tr><th>Time Schedule</th> <td> <?php echo $data['medical_shop_time_schedule']; ?></td></tr>
                                                    <tr><th>Address</th><td> <?php echo $data['medical_shop_address']; ?></td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <?php
        }
    }
    else
    {
        if($searchby=="name")
            $searchby="laboratory_name";
        else if($searchby=="email")
            $searchby="laboratory_email";
        else
            $searchby="laboratory_address";

        $sql="Select * from laboratory where $searchby like '%$searchtext%'";
        $result=mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($result))
        {
            ?>
                                <div class="card shadow mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img src='<?php echo $data['laboratory_profile_image']; ?>' width="210" height="210" style="border-radius: 20px;"/>
                                            </div>
                                            <div class="col-lg-8">
                                                <table class="table">
                                                    <tr><th>Name</th><td> <?php echo $data['laboratory_name']; ?></td></tr>
                                                    <tr><th>Phone Number</th><td> <a href="tel:<?php echo $data['laboratory_phone']; ?>"><?php echo $data['laboratory_phone']; ?></a></td></tr>
                                                    <tr><th>Email</th><td> <a href="mailto:<?php echo $data['laboratory_email']; ?>"><?php echo $data['laboratory_email']; ?></a></td></tr>
                                                    <tr><th>Time Schedule</th> <td> <?php echo $data['laboratory_time_schedule']; ?></td></tr>
                                                    <tr><th>Address</th><td> <?php echo $data['laboratory_address']; ?></td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <?php   
        }
    }
}
?>


                                
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