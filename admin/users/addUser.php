<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Check admin permissions BEFORE any output
use Permission\AdminPermission;
use Account\Register;

require_once __DIR__ . "/../../vendor/autoload.php";
$permission = new AdminPermission();
$permission->permissionAdmin();

if (isset($_POST["register"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$passwordConfirm = $_POST["passwordConfirm"];

	$register = new Register($username, $password, $passwordConfirm, "admin/users/addUser.php");
	if ($register->registerUser()) {
		header("location: /admin/users/addUser.php?status=1");
		die();
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard | Add user</title>

    <!-- Bootstrap core CSS -->
    <link href="../../static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../static/css/base-admin.css" rel="stylesheet">

</head>

<body>

<div class="d-flex" id="wrapper">
	<?php
	include(__DIR__ . "/../sidebar.php");
	?>
    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
            <button class="btn btn-dark" id="menu-toggle">Sidebar</button>
        </nav>

        <div class="container-fluid text-center">
            <form class="w-75 m-auto mt-5" action="/admin/users/addUser.php" method="POST">
				<?php
				if (isset($_GET["status"]) && $_GET["status"] == 1) {
					?>
                    <div class="pt-3 pb-3 text-center text-white bg-success w-100 h-auto">
                        <b>User created successfully</b>
                    </div>
					<?php
				} elseif (isset($_GET["error"])) {
					$error = intval($_GET["error"]);
					Register::printError($error);
				}
				?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="mb-3">
                    <label for="passwordConfirm" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="passwordConfirm" placeholder="Confirm Password"
                           name="passwordConfirm">
                </div>
                <button type="submit" class="btn btn-primary" name="register">Save</button>
            </form>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="../../static/js/jquery.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="../../static/js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>