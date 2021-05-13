<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Page Title -->
        <title>Login</title>
    </head>
    <body>
        <!-- Banner Area Starts -->
        <section class="banner-area other-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Login</h1>
                        <a href="index.php">Home</a> <span>|</span> <a href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Area End -->

        <br/>
        <div class="container">
            <?php
            if (isset($_SESSION['action'])) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sign Up Successful!</strong> Please Login.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>
        </div>
        <br/><br/>
        <!-- Contact Form Starts -->
        <section class="contact-form section-padding3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <img src="assets/images/login.jpg" class="col-lg-12" />
                    </div>
                    <div class="col-lg-5 mb-3">
                        <form action="logincontroller.php" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <select name="grp_id" class="form-control">
                                        <option value="">Select Your Role</option>
                                        <option value="1">Patient</option>
                                        <option value="2">Doctor</option>
                                        <option value="4">Medical Laboratory</option>
                                        <option value="3">Medical Shop</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="text" required name="username" placeholder="Username" class="form-control" />    
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="password" required name="password" placeholder="Password" class="form-control" />    
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary col-lg-4" value="Login">
                        </form>
                        <?php
                            if(isset($_GET['login']))
                            {?>
                                <br/>
                                <div class="alert alert-danger" role="alert">
                                    <h3><strong class="badge badge-danger"><?php echo $_GET['login']?></strong></h3>
                                    If you are new <strong style="font-size: 20px;" class="badge badge-danger"><a style="text-transform: none;color: white;" href="signup.php">Sign Up</a></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Form End -->
        <?php include 'footer.php'; ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    </body>
</html>
