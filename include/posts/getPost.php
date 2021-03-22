<?php
include(__DIR__ . "/../config.php");
$postTitle = "";
$postBody = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $postId = $_GET['id'];
    $post = $conn->query("SELECT `title`, `body` FROM `posts` WHERE `id`=$postId");
    foreach ($post as $key => $value) {
        $postTitle = $value['title'];
        $postBody = $value['body'];
    }
}
