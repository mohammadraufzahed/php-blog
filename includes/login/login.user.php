<?php
// Include Database
include '../db.php';
session_start();
// Initial a variables
$username = "";
$username_err = "";
$password = "";
$password_err = "";
// Check the request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the username to be not empty
    if (empty(trim($_POST["username"]))) {
        $password_err = "Please enter your username";
    } else {
        $username = trim($_POST["username"]);
    }
    // Validate the password to be not empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password";
    } else {
        $password = trim($_POST["password"]);
    }
    // Login the user if everything is ok
    if (empty(trim($username_err)) && empty(trim($password_err))) {
        $sql = "SELECT `id`, `username`, `password` FROM users WHERE username = '$username'";
        // Get the accounts from database
        $accounts = $db->query($sql);
        if ($accounts->rowCount() > 0) {
            foreach ($accounts as $account) {
                // Get the user infos
                $user_id = $account['id'];
                $user_name = $account['username'];
                $user_password_hash = $account['password'];
                $user_is_admin = ($account['is_admin'] == "Y") ? "true" : "false";
                if (password_verify($password, $user_password_hash)) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $user_id;
                    $_SESSION["username"] = $user_name;
                    $_SESSION['isAdmin'] = $user_is_admin;
                    header("location: index.php");
                } else {
                    // Return a error if password doesnot match
                    $password_err = "Password is wrong. Try again";
                }
            }
        }
    } else {
        $username_err = "Username not found";
    }
}
$db = null;
