<?php
require_once __DIR__ . "/../../class/Database.php";
// Create database connection
$db = new Database();
// Send request to database
$db->query("SELECT `id` FROM `posts`");
$db->execute();
$totalPosts = $db->rowCount();

$db->query("SELECT `id` FROM `users`");
$db->execute();
$totalUsers = $db->rowCount();