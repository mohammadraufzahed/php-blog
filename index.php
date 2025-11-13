<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

require_once __DIR__ . "/vendor/autoload.php";


use Blog\Info;
use Post\Fetch;

$blog = new Info();
$postManager = new Fetch();
?>
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
    <title><?php echo $blog->blogTitle; ?></title>
</head>

<body class="bg-light">
<?php include("nav.php"); ?>
<!--Body start-->
<div class="container-fluid h-100">
    <div class="row h-100 mt-2">
        <div class="col-lg-8">
			<?php $postManager->printPosts(); ?>
        </div>
        <!--Right-->
        <div class="col-lg-4">
            <div class="h-auto w-100">
                <div class="card bg-dark text-white mb-3">
                    <img class="card-img-top" src="static/img/profile.jpg" alt="Profile Image">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $blog->blogAuthor; ?></h5>
                        <p class="card-text"><?php echo $blog->blogAuthorInfo ?></p>
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