<!DOCTYPE html>
<html>
    <body>
        
        <footer class="footer-area section-padding">
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-lg-3">
                            <div class="single-widget-home mb-5 mb-lg-0">
                                <h3 class="mb-4">Redirect To</h3>
                                <ul>
                                    <li class="mb-2"><a href="index.php">Home</a></li>
                                    <li class="mb-2"><a href="about.php">About Us</a></li>
                                    <li class="mb-2"><a href="mainwindow/dashboard.php">Services</a></li>
                                    <li class="mb-2"><a href="signup.php">Sign Up</a></li>
                                    <li class="mb-2"><a href="login.php">Login</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-5 offset-xl-1 col-lg-6">
                            <div class="single-widget-home mb-5 mb-lg-0">
                                <h3 class="mb-4">Write Suggestions</h3>
                                <form method="GET">
                                    <textarea rows="5" name="message" placeholder="Please enter the suggestions ..." class="form-control"></textarea><br/>
                                    <input type="submit"class="template-btn" name="Submit" value="Submit" />
                                </form>
                            </div>
                            <br/>
                            <?php
                                if(isset($_GET['Submit']))
                                {
                                    $message = $_GET['message'];
                                    $sql = "INSERT INTO suggestions (suggestion) VALUES ('$message')";
                                    $h = "";
                                    $m = "";
                                    if(mysqli_query($con, $sql))
                                    {
                                        $h = "Success";
                                        $m = "Thanks for Suggestions.";
                                    } 
                                    else
                                    {
                                        $h = "Failed";
                                        $m = "There is some error.";  
                                    }?>
                                        
                                        <div class="alert alert-danger" role="alert">
                                            <h3><strong class="badge badge-danger"><?php echo $h;?></strong></h3><?php echo $m;?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
    
                                    <?php
                                }
                            ?>

                        </div>
                        <div class="col-xl-3 offset-xl-1 col-lg-3">
                            <div class="single-widge-home">
                                <h3 class="mb-4">Contact Us</h3>
                                <a href="mailto:Ravi.1804.makwana@gmail.com">Ravikumar Makwana</a><br/><br/>
                                <a href="mailto:shah96rushabh@gmail.com">Rushabh Shah</a><br/><br/>
                                <a href="mailto:">Idit Talaviya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <span>
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Web application developed by <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Salutem Care Team.</a>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="social-icons">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script type="text/javascript" src="jquery.js"></script>
        <script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
        <script src="assets/js/vendor/wow.min.js"></script>
        <script src="assets/js/vendor/owl-carousel.min.js"></script>
        <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
        <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
        <script src="assets/js/vendor/superfish.min.js"></script>
        <script src="assets/js/vendor/gmaps.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
    </body>
</html>