<?php

function doRegister($data, $conn)
{
	// Save data to variable
    $username = $data["username"];
    $password = password_hash($data["password"], PASSWORD_DEFAULT);
    // Save the user to database
    $sql = "INSERT INTO `users`(`username`, `password`) VALUES ('$username', '$password')";
    $registerUser = $conn->prepare($sql);
    // If exec was successful
    if ($registerUser->execute()) {
        header("location: /login.php");
    } else {
        die("Somthing goes wrong");
    }
}
