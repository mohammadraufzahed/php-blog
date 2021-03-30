<?php

// Get data from request
function getData(): array
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        return ["username" => $_POST["username"], "password" => $_POST["password"], "passwordConfirm" => $_POST["passwordConfirm"]];
    } else {
        header("location: /register.php");
    }
}
