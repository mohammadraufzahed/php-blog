<?php
require_once __DIR__ . "/../class/Post.php";
require_once __DIR__ . "/class/Posts.php";

$posts = new Post();
$postManager = new Posts();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard | Posts</title>

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
            <div class="d-flex w-100 justify-content-end">
                <a href="/admin/posts/new.php">
                    <button class="btn btn-primary mt-3 mb-3">Add Post</button>
                </a>
            </div>
			<?php
			if (isset($_GET["newPostStatus"])) {
				$errorCode = $_GET["newPostStatus"];
				$errorType = "newPost";
				$postManager->printMessages($errorType, $errorCode);
			} elseif (isset($_GET["deletePostStatus"])) {
				$errorCode = $_GET["deletePostStatus"];
				$errorType = "deletePost";
				$postManager->printMessages($errorType, $errorCode);
			} elseif (isset($_GET["updatePostStatus"])) {
				$errorCode = $_GET["updatePostStatus"];
				$errorType = "updatePost";
				$postManager->printMessages($errorType, $errorCode);
			}
			?>
            <table class="table">
                <thead>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Options</th>
                </thead>
                <tbody>
				<?php
				foreach ($posts->posts as $value) {
					?>
                    <tr class="">
                        <th scope="row"><?php echo $value->id; ?></th>
                        <td><?php echo $value->title; ?></td>
                        <td>
                            <a href="/admin/posts/edit.php?id=<?php echo $value->id; ?>">
                                <button class="btn btn-success me-3">Edit</button>
                            </a>
                            <a href="/post.php?id=<?php echo $value->id; ?>" target="_blank">
                                <button class="btn btn-primary me-3">View</button>
                            </a>
                            <a href="/admin/posts/delete.php?id=<?php echo $value->id; ?>">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
				<?php }
				?>
                </tbody>
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