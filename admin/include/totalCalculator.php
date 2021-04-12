<?php

use Database\Mysql;

require_once __DIR__ . "/../../vendor/autoload.php";

// Create database connection
$db = new Mysql();
// Send request to database
$db->query("SELECT `id` FROM `posts`");
$db->execute();
$totalPosts = $db->rowCount();

$db->query("SELECT `id` FROM `users`");
$db->execute();
$totalUsers = $db->rowCount();