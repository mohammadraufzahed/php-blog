<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="/" class="navbar-brand"><?php echo $blogTitle ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="accountDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Account</a>
                    <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                        <?php
                        session_start();
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) { ?>
                            <li><a href="/admin" class="dropdown-item">Account</a></li>
                            <li><a href="/logout.php" class="dropdown-item">Logout</a></li>
                        <?php } else { ?>
                            <li><a href="/login.php" class="dropdown-item">Login</a></li>
                            <li><a href="/register.php" class="dropdown-item">Register</a></li>
                        <?php }
                        ?>

                    </ul>
                </li>
                <li class="nav-item">
                </li>
            </ul>
        </div>
    </div>
</nav>