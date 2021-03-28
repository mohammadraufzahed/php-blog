<?php
require_once(__DIR__ . "/../config.php");
require_once(__DIR__ . "/getData.php");
require_once(__DIR__ . "/isEmpty.php");
require_once(__DIR__ . "/verifyPassword.php");
// Store a received data
$loginData = getData();
// Check the received data to be not empty
isEmpty($loginData);
// Verify the password
$userData = verifyPassword($loginData, $conn);
// Save some data in session to know user logged in
session_start();
$_SESSION["isLogged"] = true;
$_SESSION["username"] = $loginData["username"];
$_SESSION["id"] = $userData[0];
$_SESSION["isAdmin"] = $userData[1];
// Redirect user to home
header("location: /");
