<?php
require_once __DIR__ . "/class/Account/Login.php";
require_once __DIR__ . "/class/Permission.php";

$permission = new Permission();
$permission->permissionUser();

if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$login = new Login($username, $password);
	$login->loginUser();
}
$permission->permissionUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Css Files-->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
<?php include("nav.php"); ?>
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-4 m-auto">
            <div class="card bg-dark text-white text-center h-auto m-auto">
                <img src="static/img/login.jpg" alt="Login picture" class="card-img-top img-fluid">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <p class="card-text">
                    <form class="text-start" action="/login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-light" name="login">Login</button>
                        </div>
                    </form>
                    </p>
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