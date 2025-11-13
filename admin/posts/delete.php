<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

use Post\Management as PostManagement;

require_once __DIR__ . "/../../vendor/autoload.php";

$postManager = new PostManagement();

if (isset($_GET["id"])) {
	$postId = $_GET["id"];
	$postManager->deletePost($postId);
}