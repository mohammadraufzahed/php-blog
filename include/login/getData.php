<?php
// Recive login data from user
function getData(): array
{
    // Check the request method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Save the received data
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        // Return the received data
        return ["username" => $username, "password" => $password];
    } else {
        header("location: /login.php");
    }
}
