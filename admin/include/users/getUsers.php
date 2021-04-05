<?php
require_once(__DIR__ . "/../../../class/Database.php");

// Create database connection
$db = new Database();
// Send query to database
$db->query("SELECT `id`, `username`, `email` FROM `users`");
$db->execute();
$users = $db->fetchAll();
