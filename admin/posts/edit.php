<?php

use Post\Management as PostManagement;

require_once __DIR__ . "/../../vendor/autoload.php";


$postManager = new PostManagement();
if (isset($_GET["id"])) {
	$postId = $_GET["id"];
	$postManager->getPost($postId);
}
if (isset($_POST["saveId"])) {
	$postTitle = $_POST["postName"];
	$postBody = $_POST["postBody"];
	$isPublished = $_POST["publishIt"];
	$postId = $_POST["saveId"];

	$postManager->updatePost($postTitle, $postBody, $isPublished, $postId);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard | Edit post</title>

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
            <form class="w-75 m-auto mt-5" action="/admin/posts/edit.php" method="POST">
                <div class="mb-3">
                    <label for="postName" class="form-label">Post name</label>
                    <input type="text" class="form-control" id="postName" placeholder="Post title" name="postName"
                           value="<?php echo $postManager->postTitle; ?>">
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="publishIt">
                        <option>Publish it?</option>
                        <option <?php echo ($postManager->isPublished == 'Y') ? "selected" : "" ?> value="Y">Yes
                        </option>
                        <option <?php echo ($postManager->isPublished == 'N') ? "selected" : "" ?> value="N">No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="postBody" class="form-label">Post body</label>
                    <textarea class="form-control" id="postBody" rows="3"
                              name="postBody"><?php echo $postManager->postBody; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="saveId" value="<?php echo $postManager->postId; ?>">
                    Save
                </button>
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