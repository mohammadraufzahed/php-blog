<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Load the css-->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/style.css">
    <title>Blog</title>
</head>
<body class="bg-light">
<?php include("nav.php"); ?>
<!--Body start-->
<div class="container-fluid h-100">
    <div class="row h-100 mt-2">
        <div class="col-lg-8">
            <div class="post bg-dark text-white text-center h-auto">
                <img class="img-fluid post-image" src="static/img/post.jpg" alt="Post image">
                <h3 class="post-title pt-3">New Post</h3>
                <p class="pt-3 pb-3 post-text text-start m-auto">Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit. Aenean sagittis efficitur erat, ac congue
                    est consequat sit amet. Nullam vel iaculis dui. Ut sed urna bibendum, bibendum elit et, hendrerit
                    enim. Mauris odio ligula, tristique eu ultrices non, consequat vitae magna. Pellentesque facilisis
                    turpis nec mauris ullamcorper, in condimentum dolor sagittis. Praesent laoreet bibendum
                    sollicitudin. Proin sit amet ante viverra, molestie sem sit amet, pulvinar mauris. Ut consectetur
                    massa dui, non faucibus orci venenatis non. Praesent quis lacus placerat, elementum felis ut,
                    fermentum ex. In in luctus augue. Pellentesque gravida at elit id egestas. Cras nec sem scelerisque,
                    molestie lectus a, sollicitudin massa. <a class="link-primary text-end" href="#">Read more</a>
                </p>
            </div>
        </div>
        <!--Right-->
        <div class="col-lg-4">
            <div class="h-auto w-100">
                <div class="card bg-dark text-white">
                    <img class="card-img-top" src="static/img/profile.jpg" alt="Profile Image">
                    <div class="card-body text-center">
                        <h5 class="card-title">Author</h5>
                        <p class="card-text">Author info</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Body end-->
<!--Load The js files-->
<script src="static/js/jquery.js"></script>
<script src="static/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
</body>
</html>