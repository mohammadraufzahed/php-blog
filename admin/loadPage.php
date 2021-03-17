<?php
$requestUrl = $_SERVER['REQUEST_URI'];
if ($requestUrl == "/admin") {
    include "pages/home.php";
} elseif ($requestUrl == "/admin/posts") {
    include("pages/posts.php");
}
