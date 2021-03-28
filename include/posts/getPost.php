<?php
require_once(__DIR__ . "/../config.php");
$postTitle = "";
$postBody = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $postId = $_GET['id'];
    $post = $conn->prepare("SELECT `title`, `body` FROM `posts` WHERE `id`=$postId");
    $post->execute();
    $post = $post->fetchAll(PDO::FETCH_OBJ);
    foreach ($post as $key => $value) {
        $postTitle = $value->title;
        $postBody = $value->body;
    }
}
