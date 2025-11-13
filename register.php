<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

use Account\Register;
use Permission\UserPermission;

require_once __DIR__ . "/vendor/autoload.php";


$permission = new UserPermission();
$permission->permissionUser();

if (isset($_POST["register"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$passwordConfirm = $_POST["passwordConfirm"];
	$register = new Register($username, $password, $passwordConfirm, "register.php");
	if ($register->registerUser()) {
		header("location: /login.php");
		die();
	}
}
$permission->permissionUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Css Files-->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
<?php include("nav.php"); ?>
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-4 m-auto">
            <div class="card bg-dark text-white text-center w-75 h-auto m-auto">
                <img src="static/img/login.jpg" alt="Login picture" class="card-img-top img-fluid">
                <div class="card-body">
                    <h5 class="card-title">Register</h5>
                    <div class="card-text">
						<?php
						if (isset($_GET["error"])) {
							$error = intval($_GET["error"]);
							Account\Register::printError($error);
						}
						?>
                        <form class="text-start" action="/register.php" method="POST">
                            <div class="mb-1">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                       aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="passwordConfirm" class="form-label">Confirm password</label>
                                <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm">
                            </div>
                            <div class="text-center pt-1">
                                <button type="submit" class="btn btn-light" name="register">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Load The js files-->
<script src="static/js/jquery.js"></script>
<script src="static/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
</body>

</html>