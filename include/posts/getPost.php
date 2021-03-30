<?php
require_once(__DIR__ . "/../config.php");
// Define variables
$postTitle = "";
$postBody = "";
// Check the request method
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Save the data received
    $postId = $_GET['id'];
    // Send query to database
    $post = $conn->prepare("SELECT `title`, `body` FROM `posts` WHERE `id`=:id");
    $post->bindParam(":id", $postId, PDO::PARAM_INT);
    $post->execute();
    $post = $post->fetchAll(PDO::FETCH_OBJ);
    // Save the received data
    foreach ($post as $key => $value) {
        $postTitle = $value->title;
        $postBody = $value->body;
    }
}
