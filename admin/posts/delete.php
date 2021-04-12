<?php

use Post\Management as PostManagement;

require_once __DIR__ . "/../../vendor/autoload.php";

$postManager = new PostManagement();

if (isset($_GET["id"])) {
	$postId = $_GET["id"];
	$postManager->deletePost($postId);
}