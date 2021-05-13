<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="../index.php">
                    <img src="images/icon/logo.png"/>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <?php
            $grp=$_SESSION['grpid'];
                if($grp==1)
                {
            $menu='<ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="../index.php">
                        <i class="fas fa-home"></i>Home
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="patientprofile.php">
                        <i class="fas fa-chart-bar"></i>Profile
                    </a>
                </li>
                <li>
                    <a href="patientrecentactivity.php">
                        <i class="fas fa-table"></i>Recent Activities
                    </a>
                </li>
                <li>
                    <a href="patientmedicinehistory.php">
                        <i class="far fa-check-square"></i>History of Medicines
                    </a>
                </li>
                <li>
                    <a href="patientreporthistory.php">
                        <i class="fas fa-calendar-alt"></i>History of Reports
                    </a>
                </li>
                <li>
                    <a href="scheduleforappointment.php">
                        <i class="fas fa-clock-o"></i>Schedule for appointments
                    </a>
                </li>
                <li>
                    <a href="searchusers.php">
                        <i class="fas fa-user"></i>Search Doctors / Medical Shops / Laboratory
                    </a>
                </li>
            </ul>';
            echo $menu;
                }
                else if($grp==2)
                {
            $menu='<ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="../index.php">
                        <i class="fas fa-home"></i>Home
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="doctorprofile.php">
                        <i class="fas fa-chart-bar"></i>Profile
                    </a>
                </li>
                <li>
                    <a href="secretkey.php">
                        <i class="fas fa-calendar-alt"></i>Enter Secret Key
                    </a>
                </li>
                <li>
                    <a href="patientcheckup.php">
                        <i class="fas fa-table"></i>Patient Treatment
                    </a>
                </li>
                <li>
                    <a href="medicinhistory.php">
                        <i class="far fa-check-square"></i>History of Medicines
                    </a>
                </li>
                <li>
                    <a href="reporthistory.php">
                        <i class="fas fa-calendar-alt"></i>History of Reports
                    </a>
                </li>
                <li>
                    <a href="appointments.php">
                        <i class="fas fa-calendar"></i>Appointments
                    </a>
                </li>
            </ul>';
            echo $menu;
            }
                else if($grp==3)
                {

            $menu='<ul class="navbar-mobile__list list-unstyled">
                    <li>
                        <a href="../index.php" class="js-arrow">
                            <i class="fas fa-home"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php" class="js-arrow">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="medicalshopprofile.php" class="js-arrow">
                            <i class="fas fa-chart-bar"></i>Profile
                        </a>
                    </li>
                    <li>
                    <a href="secretkey.php">
                        <i class="fas fa-calendar-alt"></i>Enter Secret Key
                    </a>
                </li>
                    <li>
                        <a href="processmedicines.php" class="js-arrow">
                            <i class="fas fa-check-square"></i>Process Mediciens
                        </a>
                    </li>
            </ul>';
            echo $menu;        
                }
                else
                {
            $menu='<ul class="navbar-mobile__list list-unstyled">
                    <li>
                        <a href="../index.php" class="js-arrow">
                            <i class="fas fa-home"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php" class="js-arrow">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="laboratoryprofile.php" class="js-arrow">
                            <i class="fas fa-chart-bar"></i>Profile
                        </a>
                    </li>
                    <li>
                        <a href="secretkey.php">
                            <i class="fas fa-calendar-alt"></i>Enter Secret Key
                        </a>
                    </li>
                    <li>
                        <a href="processmedicalreports.php" class="js-arrow">
                            <i class="fas fa-check-square"></i>Process Reports
                        </a>
                    </li>
            </ul>';
            echo $menu;
                }
                ?>
        </div>
    </nav>
</header>