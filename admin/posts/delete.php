<?php
require_once __DIR__ . "/../class/Posts.php";

$postManager = new Posts();

if (isset($_GET["id"])) {
	$postId = $_GET["id"];
	$postManager->deletePost($postId);
}