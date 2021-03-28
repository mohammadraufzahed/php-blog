<?php
require_once(__DIR__ . "/../config.php");
include(__DIR__ . "/getData.php");
include(__DIR__ . "/verifyData.php");
include(__DIR__ . "/registerUser.php");
// Store received data
$registerData = getData();
// Verify data standard
verifyDataStandard($registerData);
// Check the user exists or not
verifyDataWithDatabase($registerData, $conn);
// Register the user
doRegister($registerData, $conn);
