<?php
// Check data with some standards
function verifyDataStandard(array $data): void
{
    // Check the username not empty
    if (empty(trim($data["username"]))) {
        die("Please enter your username.");
    }
    // Check the username not contain useless symbols
    $banedSymbols = ["~", "!", "@", "#", "$", "%", "^", "&", "*", "_", "+", "."];
    foreach ($banedSymbols as $value) {
        if (strpos($data["username"], $value) == true) {
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
function verifyDataWithDatabase(array $data, object $conn): void
{
    // Store needed data in variable
    $username = $data["username"];
    // Send query to database
    $sql = "SELECT * FROM `users` WHERE username=:username";
    $query = $conn->prepare($sql);
    $query->bindParam(":username", $username, PDO::PARAM_STR);
    $query->execute();
    $userFound = $query->fetchAll(PDO::FETCH_OBJ);
    // Check the user exists or not
    if ($query->rowCount()) {
        die("User exists.");
    }
}
