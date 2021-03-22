<?php
include(__DIR__ . "/../config.php");
include(__DIR__ . "/getData.php");
include(__DIR__ . "/isEmpty.php");
include(__DIR__ . "/verifyPassword.php");
$loginData = getData();
isEmpty($loginData);
$userData = verifyPassword($loginData, $conn);
session_start();
$_SESSION["isLogged"] = true;
$_SESSION["username"] = $loginData["username"];
$_SESSION["id"] = $userData[0];
$_SESSION["isAdmin"] = $userData[1];
header("location: /");
