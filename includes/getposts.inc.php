<?php
include "./db.php";

function getPosts()
{
    global $db;
    $posts = array();
    $sql = "SELECT * FROM posts";
    $posts = $db->query($sql);
    return $posts;
}
