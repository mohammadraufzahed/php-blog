<?php
require(__DIR__ . "/include/posts/getPost.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Css files-->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/style.css">
    <title>New Post</title>
</head>

<body class="bg-light">
    <?php include("nav.php"); ?>
    <div class="container-fluid">
        <div class="row h-100">
            <div class="col-lg-8 m-auto mt-4 mb-4">
                <div class="posts bg-dark text-white text-center h-auto mb-3">
                    <img class="img-fluid post-image-page" src="static/img/post.jpg" alt="Post image">
                    <h3 class="post-title pt-3"><?php echo $postTitle; ?></h3>
                    <p class="pt-3 pb-3 post-text-page text-start m-auto"><?php echo $postBody; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!--Load The js files-->
    <script src="static/js/jquery.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
</body>

</html>