<?php
require_once(__DIR__ . "/../../include/config.php");
// Check the request method
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	// Store the needed data
    $userID = $_GET["id"];
    // Send the delete request to database
    $sql = "DELETE FROM `users` WHERE `id`=$userID AND `is_admin`='N'";
    $query = $conn->prepare($sql);
    // Check the request successfully executed
    if ($query->execute()) {
        header("location: /admin/users.php");
    } else {
        die("User cannot found");
    }
}