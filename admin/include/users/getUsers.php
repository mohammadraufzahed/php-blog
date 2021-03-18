<?php
include(__DIR__ . "/../../../include/config.php");

$users = $conn->query("SELECT `id`, `username`, `email` FROM `users`");
