<?php
include(__DIR__ . "/../config.php");
include(__DIR__ . "/getData.php");
include(__DIR__ . "/isEmpty.php");
include(__DIR__ . "/verifyPassword.php");
$loginData = getData();
isEmpty($loginData);
$userId = verifyPassword($loginData, $conn);
session_start();
$_SESSION["isLogged"] = true;
$_SESSION["username"] = $loginData["username"];
$_SESSION["id"] = $userId;
