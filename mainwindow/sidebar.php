<?php
$grp = $_SESSION['grpid'];
if ($grp == 1) {?>
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="../index.php">
            <img src="images/icon/logo.png" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
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
            </ul>
        </nav>
    </div>
</aside>
<?php
} elseif ($grp == 2) {

?>
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="../index.php">
            <img src="images/icon/logo.png" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
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
            </ul>
        </nav>
    </div>
</aside>
<?php
}
elseif ($grp == 3)
{?>
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="../index.php">
                <img src="images/icon/logo.png" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
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
                </ul>
            </nav>
        </div>
    </aside>
    <?php
}
elseif ($grp == 4)
{
    ?>
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="../index.php">
                <img src="images/icon/logo.png" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
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
                </ul>
            </nav>
        </div>
    </aside>

    <?php
}
?>