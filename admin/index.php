<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use Permission\AdminPermission;
require_once __DIR__ . "/../vendor/autoload.php";
$permission = new AdminPermission();
$permission->permissionAdmin();

require_once(__DIR__ . "/include/totalCalculator.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../static/css/base-admin.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">
        <?php
        include(__DIR__ . "/sidebar.php");
        ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                <button class="btn btn-dark" id="menu-toggle">Sidebar</button>
            </nav>

            <div class="container-fluid text-center">
                <h1>Dashboard</h1>
                <table class="table table-dark table-striped w-25 m-auto text-start">
                    <tr>
                        <th>Total Posts:</th>
                        <td><?php echo $totalPosts; ?></td>
                    </tr>
                    <tr>
                        <th>Total Users:</th>
                        <td><?php echo $totalUsers; ?></td>
                    </tr>
                    <tr>
                        <th>Total Views:</th>
                        <td>100</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="../static/js/jquery.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="../static/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>