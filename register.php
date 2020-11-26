<?php
include "includes/register.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/register.css">
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <!-- Import bootstrap -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
</head>

<body class="text-center">
    <div class="container col-12">
        <?php
        session_start();
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]) { ?>
            <h1 class="h1"> You are logged in</h1>
            <a class="link-primary" href="/index.php">Go Home</a>
        <?php } else { ?>
            <h1 id="header">Sign Up</h1>
            <div class="<?php echo (!empty(trim($username_err)) or !empty(trim($password_err)) or !empty(trim($password_confirm_err))) ? "card text-white bg-danger mb-3" : "" ?>">
                <?php
                if (!empty(trim($username_err)) or !empty(trim($password_err)) or !empty(trim($password_confirm_err))) { ?>
                    <div class='card-header'>Error</div>
                    <div class="card-body">
                        <h5 class="card-title">An error happend</h5>
                        <?php
                        if (!empty(trim($username_err))) {
                            echo "<p class='card-text'>$username_err</p>";
                        }
                        if (!empty(trim($password_err))) {
                            echo "<p class='card-text'>$password_err</p>";
                        }
                        if (!empty(trim($password_confirm_err))) {
                            echo "<p class='card-text'>$password_confirm_err</p>";
                        }
                        ?>
                    </div>
                <?php }


                ?>
            </div>
            <form class="mt-3 col-12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" id="signup_form" method="POST">
                <div class="input-group mb-3 col-12">
                    <span class="input-group-text" id="user-opt">Username: </span>
                    <input class="form-control <?php echo (!empty($username_err)) ? "not_valid" : "" ?>" type="text" placeholder="Username" aria-placeholder="Username" aria-describedby="user-opt" name="username">
                </div>
                <div class="input-group mb-3 col-12">
                    <span class="input-group-text" id="password-opt">Password: </span>
                    <input class="form-control <?php echo (!empty($password_err)) ? "not_valid" : "" ?>" type="password" placeholder="Password" aria-placeholder="Password" aria-describedby="password-opt" name="password">
                </div>
                <div class="input-group mb-3 col-12">
                    <span class="input-group-text" id="passcon-opt">Confirm Password: </span>
                    <input class="form-control <?php echo (!empty($password_confirm_err)) ? "not_valid" : "" ?>" type="password" placeholder="Confirm Password" aria-placeholder="Confirm Password" aria-describedby="passcon-opt" name="passwordC">
                </div>
                <button class="btn btn-primary" type="submit">Sign up</button>
            </form>
        <?php } ?>
    </div>
    <!-- Import bootstrap js -->
    <script src="static/js/bootstrap.bundle.min.js"></script>
</body>

</html>