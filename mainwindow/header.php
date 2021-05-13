<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    <div class="noti-wrap">
                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>Incoming Calls</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c2 img-cir img-40">
                                        <i class="zmdi zmdi-account-box"></i>
                                    </div>
                                    <div class="content">
                                        <script type="text/javascript" src="../jquery.js"></script>
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                            setInterval(function(){ $('#result').load("../incomingcalls.php"); }, 20000)
                                          });
                                        </script>
                                        <div id="result"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="<?php echo($profile_image); ?>">
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo $name; ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <img src="<?php echo($profile_image); ?>">
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <label><?php echo $name; ?></label>
                                        </h5>
                                        <span class="email"><?php echo $email; ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <?php
                                    $grp = $_SESSION['grpid'];
                                    if($grp==1)
                                    {
                                        $dropdown='
                                        <div class="account-dropdown__item">
                                            <a href="patientprofile.php">
                                                <i class="zmdi zmdi-account"></i>Profile
                                            </a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="scheduleforappointment.php">
                                                <i class="fas fa-clock"></i>Schedule for appointments
                                            </a>
                                        </div>';
                                        echo $dropdown;
                                    }
                                    else if($grp==2)
                                    {
                                        $dropdown='
                                        <div class="account-dropdown__item">
                                            <a href="doctorprofile.php">
                                                <i class="zmdi zmdi-account"></i>Profile
                                            </a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="appointments.php">
                                                <i class="fa fa-calendar"></i>Appointments
                                            </a>
                                        </div>';
                                        echo $dropdown;
                                    }
                                    else if($grp==3)
                                    {
                                        $dropdown='
                                        <div class="account-dropdown__item">
                                            <a href="medicalshopprofile.php">
                                                <i class="zmdi zmdi-account"></i>Profile
                                            </a>
                                        </div>';
                                        echo $dropdown;
                                    }
                                    else if($grp==4)
                                    {
                                        $dropdown='
                                        <div class="account-dropdown__item">
                                            <a href="laboratoryprofile.php">
                                                <i class="zmdi zmdi-account"></i>Profile
                                            </a>
                                        </div>';
                                        echo $dropdown;
                                    }

                                    ?>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="logout.php" name="logout">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>