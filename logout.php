<?php
include(__DIR__ . "/include/permission.php");
session_start();
$_SESSION = array();
session_destroy();
header("location: /login.php");
