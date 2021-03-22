<?php

function doRegister($data, $conn)
{
    $username = $data["username"];
    $password = password_hash($data["password"], PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users`(`username`, `password`) VALUES ('$username', '$password')";
    if ($conn->query($sql)) {
        header("location: /login.php");
    } else {
        die("Somthing goes wrong");
    }
}
