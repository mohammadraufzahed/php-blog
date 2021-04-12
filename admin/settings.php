<?php

use Blog\Settings;

require_once __DIR__ . "/../vendor/autoload.php";
$settings = new Settings();
if (isset($_POST["update"])) {
	$blogTitle = $_POST["blogName"];
	$blogAuthor = $_POST["authorName"];
	$blogAuthorInfo = $_POST["authorInfo"];
	$settings->updateSettings($blogTitle, $blogAuthor, $blogAuthorInfo);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard | Settings</title>

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
            <form class="w-50 m-auto mt-5" action="/admin/settings.php" method="POST">
				<?php
				if (isset($_GET["updateStatus"])) {
					$updateStatus = $_GET["updateStatus"];
					?>
                    <div class="pt-3 pb-3 text-center text-white bg-<?php echo ($updateStatus == 1) ? "success" : "danger" ?> w-100 h-auto">
                        <p><?php echo ($updateStatus == 1) ? "Settings updated successfully" : "Something goes wrong"; ?></p>
                    </div>
					<?php
				}
				?>
                <div class="mb-3">
                    <label for="blogName" class="form-label">Blog name</label>
                    <input type="text" class="form-control" id="blogName" value="<?php echo $settings->blogTitle; ?>"
                           name="blogName">
                </div>
                <div class="mb-3">
                    <label for="authorName" class="form-label">Author name</label>
                    <input type="text" class="form-control" id="authorName" value="<?php echo $settings->blogAuthor; ?>"
                           name="authorName">
                </div>
                <div class="mb-3">
                    <label for="authorInfo" class="form-label">Author info</label>
                    <textarea class="form-control" id="authorInfo" rows="3"
                              name="authorInfo"><?php echo $settings->blogAuthorInfo; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="update">Save</button>
            </form>
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