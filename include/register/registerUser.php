<?php

// Register user in database
function doRegister(array $data, object $conn): void
{
    // Save data to variable
    $username = $data["username"];
    $password = password_hash($data["password"], PASSWORD_DEFAULT);
    // Save the user to database
    $sql = "INSERT INTO `users`(`username`, `password`) VALUES (:username, :password)";
    $registerUser = $conn->prepare($sql);
    $registerUser->bindParam(":username", $username, PDO::PARAM_STR);
    $registerUser->bindParam(":password", $password, PDO::PARAM_STR);
    // If exec was successful
    if ($registerUser->execute()) {
        header("location: /login.php");
    } else {
        die("Somthing goes wrong");
    }
}
