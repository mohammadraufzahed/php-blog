<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

use Database\Mysql;

require_once(__DIR__ . "/../../vendor/autoload.php");

// Check the request method
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	// Create database connection
	$db = new Mysql();
	// Store the needed data
	$userID = intval($_GET["id"]);
	// Send the delete request to database
	$db->query("DELETE FROM `users` WHERE `id`=:id AND `is_admin`='N'");
	$db->bind(":id", $userID, PDO::PARAM_INT);
	// Check the request successfully executed
	if ($db->execute()) {
		header("location: /admin/users.php?deleteStatus=1");
		die();
	} else {
		header("location: /admin/users.php?deleteStatus=2");
		die();
	}
}