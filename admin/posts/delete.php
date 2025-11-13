<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Check admin permissions BEFORE any output
use Permission\AdminPermission;
use Post\Management as PostManagement;

require_once __DIR__ . "/../../vendor/autoload.php";
$permission = new AdminPermission();
$permission->permissionAdmin();

$postManager = new PostManagement();

if (isset($_GET["id"])) {
	$postId = $_GET["id"];
	$postManager->deletePost($postId);
}