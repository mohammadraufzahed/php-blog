<?php
require(__DIR__ . "/../../include/config.php");
$posts = $conn->query("SELECT `id` FROM posts");
$users = $conn->query("SELECT `id` FROM users");

$totalUsers = 0;
$totalPosts = 0;

foreach ($posts as $key => $value) {
    $totalPosts++;
}
foreach ($users as $key => $value) {
    $totalUsers++;
}
