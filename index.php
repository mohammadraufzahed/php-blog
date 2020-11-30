<?php
include "includes/db.php";
include "includes/post/getAll.post.php";
include "includes/getBlogInfo.inc.php";

$posts = getAllPosts();
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $blogTitle ?></title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="static/css/bootstrap.min.css">
    </head>

    <body>
    <header>
        <?php include "includes/nav.inc.php" ?>
    </header>
    <div class="clearfix"></div>
    <main class="container-fluid">
        <div class="row">
            <div class="container-fluid col-lg-8">
                <?php
                foreach ($posts as $post) {
                    $postAuthorId = $post["user_id"];
                    $postAuthor = "";
                    $author = $db->query("SELECT username FROM users WHERE id = $postAuthorId");
                    foreach ($author as $authorName) {
                        $postAuthor = $authorName[0];
                    }
                    if ($post['published'] == 'Y') {
                        ?>
                        <div class="mt-4 container card text-center text-dark bg-light">
                            <h5 class="card-title mt-3"><?php echo $post['title']; ?></h5>
                            <span class="card-subtitle fw-lighters">Created at <?php echo $post['created_at']; ?></span>
                            <span class="card-text border m-4 p-2"><?php echo $post["body"]; ?></span>
                        </div>
                    <?php }
                }
                ?>

            </div>
            <div class="mt-4 card text-center col-lg-4 bg-light text-dark" style="height: max-content;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $blogAuthor ?></h5>
                    <p class="card-text"><?php echo $blogAuthorInfo ?></p>
                </div>
            </div>
        </div>
    </main>
    <script src="static/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php $db = null; ?>