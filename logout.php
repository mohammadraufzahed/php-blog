<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
if (empty($_SESSION["isLogged"])) {
	header("location: /index.php");
	die();
}
$_SESSION = array();
session_destroy();
header("location: /login.php");
