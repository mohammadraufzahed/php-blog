<?php
include "db.php";
function getPost($id)
{
    global $db;
    $sql = "SELECT title, body, published FROM posts WHERE id = $id";
    $post = $db->query($sql);
    foreach ($post as $posts) {
        $post = $posts;
    }
    return $post;
}
