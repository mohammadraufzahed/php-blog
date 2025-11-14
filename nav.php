<?php

use Blog\Info;

require_once __DIR__ . "/vendor/autoload.php";

$blog = new Info();
?>
<!--Navabr Start-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="/" class="navbar-brand"><?php echo $blog->blogTitle; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav d-flex ms-auto justify-content-end">
                <?php
                if (empty($_SESSION["isLogged"])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <?php
                } elseif (!empty($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 'Y') {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Dashboard</a>
                    </li>
                    <?php
                }
                if (!empty($_SESSION['isLogged'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<!--Navbar end-->