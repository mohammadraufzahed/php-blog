<?php
include(__DIR__ . "/../config.php");
include(__DIR__ . "/getData.php");
include(__DIR__ . "/verifyData.php");
include(__DIR__ . "/registerUser.php");
$registerData = getData();
verifyDataStandard($registerData);
verifyDataWithDatabase($registerData, $conn);
doRegister($registerData, $conn);
