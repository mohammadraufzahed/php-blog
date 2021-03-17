<?php
$requestUrl = $_SERVER['REQUEST_URI'];
if ($requestUrl == "/admin") {
    include "pages/home.php";
} elseif ($requestUrl == "/admin/posts") {
    include("pages/posts.php");
} elseif ($requestUrl == "/admin/newPost") {
    include("pages/posts/new.php");
} elseif ($requestUrl == "/admin/users") {
    include("pages/users.php");
} elseif ($requestUrl == "/admin/settings") {
    include("pages/settings.php");
}
