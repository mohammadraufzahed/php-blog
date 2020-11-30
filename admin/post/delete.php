<?php
include "../../includes/account/isAdmin.php";
include "../../includes/db.php";
include "../../includes/getBlogInfo.inc.php";
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $postId = $_GET['id'];
    $sql = "DELETE FROM `posts` WHERE `id` = $postId";
    try {
        $db->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
sleep(1);
header("location: /admin/post");
$db = null;
