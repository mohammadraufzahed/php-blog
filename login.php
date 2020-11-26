<?php
include "includes/login.inc.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/login.css">`
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Import the bootstrap -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">

</head>

<body class="text-center">
    <div class="container-fluid">
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
            <h1 class="h1"> You are logged in</h1>
            <a class="link-primary" href="/index.php">Go Home</a>
        <?php } else { ?>

            <h1 class="h1 mb-3 fw-normal">Login</h1>
            <div class="<?php echo (!empty(trim($password_err)) || !empty(trim($username_err))) ? "errors" : ""; ?>">

            </div>
            <form id="login_form" class="lg" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <div class="input-group mb-3 col-12">
                    <span class="input-group-text" id="option-1">Username: </span>
                    <input class="form-control" type="text" name="username" placeholder="Username" aria-placeholder="Username" aria-describedby="option-1">
                </div>
                <div class="input-group mb-3 col-12">
                    <span class="input-group-text" id="option-2">Password: </span>
                    <input class="form-control" type="password" name="password" placeholder="Password" aria-placeholder="Password" aria-describedby="option-2">
                </div>
                <button class="btn btn-primary" type="submit">Login</button>
            </form>
        <?php }
        ?>
        <div class="">

        </div>
        <script src="static/js/bootstrap.bundle.min.js"></script>

    </div>

</body>

</html>