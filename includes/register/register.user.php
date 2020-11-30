<?php
// Include Database
include "../db.php";
// Initial the variables
$username = "";
$password = "";
$password_confirm = "";
// Initial the error variables
$username_err = "";
$password_err = "";
$password_confirm_err = "";

// Processing form data if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verify the username
    if (empty(trim($_POST['username']))) {
        // If username is empty return a error
        $username_err = "Please enter your username";
    } else {
        // Get the username
        $username = $_POST["username"];
        $sql = "SELECT username FROM users";
        // Get the usernames from database
        $usernames = $db->query($sql);
        // Check the each username from database and if database matched with one of them return a error
        foreach ($usernames as $user) {
            if ($user[0] == $username) {
                $username_err = "User exists";
                break;
            } else {
                continue;
            }
        }
    }
    // Verify the password
    if (empty(trim($_POST["password"]))) {
        // Return a error if password is empty
        $password_err = "Please enter your password";
    } else {
        $password = $_POST["password"];
        // Verify the password confirm
        if ($password != $_POST["passwordC"]) {
            // Return a error if password does not match
            $password_confirm_err = "Passwords didn't match";
        }
    }
    // Insert a user information to database if everything is correct
    if (empty(trim($username_err)) and empty(trim($password_err)) and empty(trim($password_confirm_err))) {
        $sql = "INSERT INTO `users`(`username`, `password`) VALUES ('$username','" . password_hash($password, PASSWORD_DEFAULT) . "')";
        echo $sql;
        if ($db->exec($sql)) {
            header("location: login.php");
        } else {
            echo "Somthing went wrong. Try again";
        }
    }
}
$db = null;
