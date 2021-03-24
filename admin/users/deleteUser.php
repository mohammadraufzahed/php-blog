<?php
require(__DIR__ . "/../../include/config.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userID = $_GET["id"];
    $sql = "DELETE FROM `users` WHERE `id`=$userID AND `is_admin`='N'";
    if ($conn->exec($sql)) {
        header("location: /admin/users.php");
    } else {
        die("User cannot found");
    }
}