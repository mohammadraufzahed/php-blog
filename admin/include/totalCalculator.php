<?php
require_once(__DIR__ . "/../../include/config.php");
// Send request to database
$posts = $conn->prepare("SELECT `id` FROM posts");
$posts->execute();
$posts = $posts->fetchAll(PDO::FETCH_OBJ);
$users = $conn->prepare("SELECT `id` FROM users");
$users->execute();
$users = $users->fetchAll(PDO::FETCH_OBJ);

// Define the counter variables
$totalUsers = 0;
$totalPosts = 0;

// Add 1 for each Post received from database
foreach ($posts as $key => $value) {
    $totalPosts++;
}
// Add 1 for each user received from database
foreach ($users as $key => $value) {
    $totalUsers++;
}
