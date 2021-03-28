<?php
require_once(__DIR__ . "/../../../include/config.php");

$users = $conn->prepare("SELECT `id`, `username`, `email` FROM `users`");
$users->execute();
$users = $users->fetchAll(PDO::FETCH_OBJ);