<?php
include "../../includes/account/isAdmin.php";
include "../../includes/db.php";
include "../../includes/getBlogInfo.inc.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blogTitle = $_POST['blogTitle'];
    $blogDescription = $_POST['blogDescription'];
    $blogAuthor = $_POST['blogAuthor'];
    $blogAuthorInfo = $_POST['blogAuthorInfo'];
    $sql = "UPDATE `settings` SET `blogTitle` = '$blogTitle', `blogDescription` = '$blogDescription', `blogAuthor` = '$blogAuthor', `blogAuthorInfo` = '$blogAuthorInfo'";
    $db->exec($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | <?php echo $blogTitle; ?></title>
    <link rel="stylesheet" href="../../static/css/main.css">
    <link rel="stylesheet" href="../../static/css/bootstrap.min.css">
</head>

<body>
    <?php include "../nav.php"; ?>
    <script src="../../static/js/bootstrap.bundle.min.js"></script>
    <div class="container-lg">
        <form class="mt-3" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="blogTitle" class="form-label">Blog Title</label>
            <div class="input-group mb-3">
                <input type="text" id="blogTitle" name="blogTitle" class="form-control" value="<?php echo $blogTitle; ?>">
            </div>
            <label for="blogDescription" class="form-label">Blog Description</label>
            <div class="input-group mb-3">
                <input type="text" id="blogDescription" name="blogDescription" class="form-control" value="<?php echo $blogDescription; ?>">
            </div>
            <label for="blogAuthor" class="form-label">Blog Author</label>
            <div class="input-group mb-3">
                <input type="text" id="blogAuthor" name="blogAuthor" class="form-control" value="<?php echo $blogAuthor; ?>">
            </div>
            <label for="blogAuthorInfo" class="form-label">Blog Author Info</label>
            <div class="input-group mb-3">
                <input type="text" id="blogAuthorInfo" name="blogAuthorInfo" class="form-control" value="<?php echo $blogAuthorInfo; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>

</html>
<?php $db = null; ?>