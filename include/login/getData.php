<?php
// Recive login data from user
function getData()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $loginData = ["username" => $username, "password" => $password];
        return $loginData;
    } else {
        header("location: /login.php");
    }
}
