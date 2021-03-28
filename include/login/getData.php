<?php
// Recive login data from user
function getData()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        return ["username" => $username, "password" => $password];
    } else {
        header("location: /login.php");
    }
}
