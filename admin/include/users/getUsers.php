<?php

use Database\Mysql;

require_once(__DIR__ . "/../../../vendor/autoload.php");

// Create database connection
$db = new Mysql();
// Send query to database
$db->query("SELECT `id`, `username`, `email` FROM `users`");
$db->execute();
$users = $db->fetchAll();
