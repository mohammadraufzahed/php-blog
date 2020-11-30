<?php
include "../../includes/account/isAdmin.php";
include "../../includes/db.php";
include "../../includes/getBlogInfo.inc.php";
include "../../includes/post/get.post.php";
// Defind the variables
$postTitle;
$postBody;
$postPublished;
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $postId = $_GET['id'];
    $post = getPost($postId);
    $postTitle = $post['title'];
    $postBody = $post['body'];
    $postPublished = ($post['published'] == 'Y') ? 'true' : 'false';
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $postTitle = $_POST['postTitle'];
    $postBody = $_POST['postBody'];
    $postPublished = ($_POST['postPublished'] == "True") ? 'Y' : 'N';
    $postId = $_POST['id'];
    $sql = "UPDATE posts SET title = '$postTitle', body = '$postBody', published = '$postPublished' WHERE id = $postId";
    $db->exec($sql);
    header("location: /admin/post");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $blogTitle ?></title>
    <link rel="stylesheet" href="../../static/css/main.css">
    <link rel="stylesheet" href="../../static/css/bootstrap.min.css">
</head>

<body>
    <?php include "../nav.php"; ?>
    <div class="container border mt-3">
        <form class="m-3" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="postTitle" class="form-label">Title</label>
            <div class="input-group mb-3 mt-3">
                <input class="form-control" type="text" id="postTitle" name="postTitle" value="<?php echo $postTitle; ?>">
            </div>
            <div class="form-floating">
                <textarea name="postBody" id="postBody" class="form-control" placeholder="Body" style="height: max-content;"><?php echo $postBody; ?></textarea>
                <label for="postBody">Body</label>
            </div>
            <div class="input-group mb-3 mt-3">
                <label for="postPublished" class="input-group-text">Published</label>
                <select name="postPublished" id="postPublished" class="form-select">
                    <option value="True" <?php echo ($postPublished == 'true') ? "selected" : ''; ?>>Yes</option>
                    <option value="False" <?php echo ($postPublished == 'false') ? "selected" : ''; ?>>No</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit" name="id" value="<?php echo $postId; ?>">Save</button>
        </form>
    </div>
    <script src="../../static/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php $db = null ?>