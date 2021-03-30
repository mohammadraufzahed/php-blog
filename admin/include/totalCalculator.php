<?php
require_once(__DIR__ . "/../../include/config.php");
// Send request to database
$posts = $conn->prepare("SELECT `id` FROM `posts`");
$posts->execute();
$users = $conn->prepare("SELECT `id` FROM `users`");
$users->execute();

// Define the counter variables
$totalUsers = $users->rowCount();
$totalPosts = $posts->rowCount();
