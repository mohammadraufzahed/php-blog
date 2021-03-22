<?php
include(__DIR__ . "/../config.php");
// Check data with some standards
function verifyDataStandard($data)
{
    // Check the username not empty
    if (empty(trim($data["username"]))) {
        die("Please enter your username.");
    }
    // Check the username not contain useless symbols
    $banedSymbols = ["~", "!", "@", "#", "$", "%", "^", "&", "*", "_", "+", "."];
    for ($i = 0; $i <= (sizeof($banedSymbols) - 1); $i++) {
        if(strpos($data["username"], $banedSymbols[$i]) == true){
            die("Your username must not contain(~!@#$%^&*_+.)");
        }
    }
    // Check the password and passwordConfirm not empty
    if (empty(trim($data["password"])) || empty(trim($data["passwordConfirm"]))) {
        die("Please enter your password");
    }
    // Check the password and passwordConfirm to be equal
    if ($data["password"] !== $data["passwordConfirm"]) {
        die("Password and Password Confirm are not equal.");
    }
}

// Check the database if username exists or not
function verifyDataWithDatabase($data, $conn)
{
    $username = $data["username"];
    $sql = "SELECT * FROM `users` WHERE username='$username'";
    $userFound = $conn->query($sql);
    $userFoundCount = 0;
    foreach ($userFound as $key => $value) {
        $userFoundCount++;
    }
    if ($userFoundCount) {
        die("User exists.");
    }
}
