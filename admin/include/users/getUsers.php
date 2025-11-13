<?php

use Database\Mysql;

$db = new Mysql();
$db->query("SELECT `id`, `username`, `email` FROM `users`");
$db->execute();
$users = $db->fetchAll();
