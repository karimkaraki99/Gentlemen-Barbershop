<!-- Navbar -->
<nav id="navbar" class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img class="navLogo" src="icons/gentlemen logo.png" alt="Gentlemen Logo"></a>
        <button class="navbar-toggler navbarIcon" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><img class="navIcon" src="icons/system-outline-12-arrow-down.gif" alt=""></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="aboutUs.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php" >Contact Us</a>
                </li>

                <?php
                if (isset($_SESSION['user_name'])) {
                    // user
                    echo '<li class="nav-item">
                            <a href="?logout" class="nav-link getAppNav" style="color: rgb(167, 20, 20); font-weight: bold;  text-align: center;">Logout</a>
                          </li>';
                } else if (isset($_SESSION['admin_name'])) {
                    // admin
                    echo '<li class="nav-item">
                            <a href="admin/admin_page.php" class="nav-link getAppNav" style="color: black; text-align: center;">Admin Page</a>
                          </li>';
                } else {
                    echo '<li class="nav-item">
                            <a href="php/login.php" class="nav-link getAppNav" style="color: black; text-align: center;">Log in</a>
                          </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
