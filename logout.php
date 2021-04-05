<?php
session_start();
if ((!$_SESSION["isLogged"])) {
	header("location: /index.php");
	die();
}
$_SESSION = array();
session_destroy();
header("location: /login.php");
