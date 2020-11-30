<?php
include "../includes/db.php";
include "../includes/getBlogInfo.inc.php";
include "../includes/post/getAll.post.php";
$totalPosts = 0;
$posts = getAllPosts();
foreach ($posts as $post) {
    $totalPosts++;
}
session_start();
if (isset($_SESSION["isAdmin"]) && $_SESSION['isAdmin'] == true) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $blogTitle; ?> Settings</title>
        <link rel="stylesheet" href="../static/css/main.css">
        <link rel="stylesheet" href="../static/css/admin.index.css">
        <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    </head>

    <body>
        <?php include "nav.php"; ?>
        <main class="container-fluid">
            <div class="card bg-light text-dark text-center">
                <div class="card-body">
                    <h1 class="card-title h1">Summery</h1>
                    <p class="card-text"> Total posts: <?php echo $totalPosts ?></p>
                </div>
            </div>
        </main>
        <script src="../static/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php } else {
    header('location: login.php');
}
$db = null;
?>