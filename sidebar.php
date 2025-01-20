<style>
#side_menu {}

#side_menu:hover {
    color: #c1b460;
}
</style>
<!-- Sidebar -->
<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#15284c" ;>

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="./img/fav_white.png" alt="AdminLTELogo" height="80" width="80"
                style="padding-top:10px; padding-bottom: 10px;">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo" id="side_menu">
            <i class="fas fa-fw fa-cog"></i>
            <span> Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header" id="side_menu">Custom Components:</h6>
                <a class="collapse-item" href="./buttons.php" id="side_menu">Buttons</a>
                <a class="collapse-item" href="./cards.php" id="side_menu">Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities" id="side_menu">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" id="side_menu" href="./utilities-color.php">Colors</a>
                <a class="collapse-item" id="side_menu" href="./utilities-border.php">Borders</a>
                <a class="collapse-item" id="side_menu" href="./utilities-animation.php">Animations</a>
                <a class="collapse-item" id="side_menu" href="./utilities-other.php">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages" id="side_menu">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" id="side_menu" href="./login.php">Login</a>
                <a class="collapse-item" id="side_menu" href="./register.php">Register</a>
                <a class="collapse-item" id="side_menu" href="./forgot-password.php">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header" id="side_menu">Other Pages:</h6>
                <a class="collapse-item" id="side_menu" href="./404.php">404
                    Page</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="./charts.php" id="side_menu">
            <i class="fas fa-fw fa-chart-area" id="side_menu"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="./tables.php" id="side_menu">
            <i class="fas fa-fw fa-table" id="side_menu"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>

    </div>


</ul>
<!-- End of Sidebar -->