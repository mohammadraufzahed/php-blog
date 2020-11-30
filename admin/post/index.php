<?php
include "../../includes/account/isAdmin.php";
include "../../includes/db.php";
include "../../includes/post/getAll.post.php";
include "../../includes/getBlogInfo.inc.php";
$posts = getAllPosts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="../../static/css/main.css">
    <link rel="stylesheet" href="../../static/css/bootstrap.min.css">
</head>

<body>
    <?php include "../nav.php"; ?>
    <div class="container">
        <div class="container-lg">

        </div>
        <table class="table border mt-2">
            <thead>
                <th>Post ID</th>
                <th>Post Creator</th>
                <th>Post Title</th>
                <th>Creation time</th>
                <th>Published</th>
                <th>Delete Post</th>
                <th>Edit</th>
            </thead>
            <tbody>
                <?php
                foreach ($posts as $post) { ?>
                    <tr>
                        <th scope="col"><?php echo $post['id']; ?></th>
                        <td>s</td>
                        <td><?php echo $post['title']; ?></td>
                        <td><?php echo $post['created_at']; ?></td>
                        <td><?php echo ($post['published'] == 'Y') ? "Yes" : "No"; ?></td>
                        <td><a class="text-danger" href="/admin/post/delete.php?id=<?php echo $post['id']; ?>">Remove</a></td>
                        <td><a class="text-primary" href="/admin/post/edit.php?id=<?php echo $post['id'] ?>">Edit</a></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <script src="../../static/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php $db = null; ?>