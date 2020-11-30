<?php
include "../../includes/account/isAdmin.php";
include "../../includes/db.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initial the error variables
    $postTitleErr = "";
    $postBodyErr = "";
    $postSaveErr = "";
    // Check the post title
    if (empty(trim($_POST['postTitle']))) {
        $postTitleErr = "Please title is empty";
    } else {
        $postTitle = $_POST['postTitle'];
    }
    if (empty(trim($_POST['postBody']))) {
        $postBodyErr = "Post body is empty ";
    } else {
        $postBody = $_POST['postBody'];
    }
    if (empty(trim($postTitleErr)) && empty(trim($postBodyErr))) {
        session_start();
        $postPublished = ($_POST['postPublished'] == 'true') ? 'Y' : 'N';
        $postAuthor = $_SESSION['id'];
        $sql = "INSERT INTO posts (`user_id`, `title`, `body`, `published`) VALUES ($postAuthor, '$postTitle', '$postBody', '$postPublished')";
        if ($db->exec($sql)) {
        } else {
            $postSaveErr = "Somthing went wrong. Try again";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="../../static/css/main.css">
    <link rel="stylesheet" href="../../static/css/bootstrap.min.css">
</head>

<body>
    <?php include "../nav.php" ?>
    <div class="container">
        <div class="card bg-danger text-white mt-3 mb-3" style="<?php echo (!empty(trim($postTitleErr)) && !empty(trim($postBodyErr)) && !empty(trim($postSaveErr))) ? "display: block;" : "display: none;" ?>">
            <div class="card-body">
                <?php
                if (!empty(trim($postTitleErr))) {
                    echo $postTitleErr . '<br />';
                }
                if (!empty(trim($postBodyErr))) {
                    echo $postBodyErr . '<br />';
                }
                if (!empty(trim($postSaveErr))) {
                    echo $postSaveErr . '<br />';
                }
                ?>
            </div>
        </div>
        <form class="m-3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div class="form-floating mb-3">
                <input type="text" name="postTitle" id="postTitle" placeholder="Title" class="form-control">
                <label for="postTitle">Title</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="postBody" placeholder="Body" id="postBody" class="form-control" style="height: max-content;"></textarea>
                <label for="postBody">Body</label>
            </div>
            <label for="postPublished">Publish</label>
            <select name="postPublished" id="postPublished" class="form-select">
                <option value="true" selected>Yes</option>
                <option value="false">No</option>
            </select>
            <button class="btn btn-primary mt-3" type="submit">Save</button>
        </form>
    </div>
    <script src="../../static/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php $db = null; ?>