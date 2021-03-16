<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../static/css/base-admin.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-dark border-right text-white" id="sidebar-wrapper">
            <div class="sidebar-heading">Start Bootstrap </div>
            <div class="list-group list-group-flush">
                <a href="/admin" class="list-group-item list-group-item-action bg-dark text-white border-light">Dashboard</a>
                <a href="/admin/posts" class="list-group-item list-group-item-action bg-dark text-white border-light">Posts</a>
                <a href="/admin/users" class="list-group-item list-group-item-action bg-dark text-white border-light">Users</a>
                <a href="/admin/settings.php" class="list-group-item list-group-item-action bg-dark text-white border-light">Settings</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

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
                        <td>10</td>
                    </tr>
                    <tr>
                        <th>Total Users:</th>
                        <td>5</td>
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
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>