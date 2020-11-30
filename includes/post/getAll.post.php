<?php
include "./db.php";

function getAllPosts()
{
    global $db;
    $posts = array();
    $sql = "SELECT * FROM posts";
    $posts = $db->query($sql);
    return $posts;
}
