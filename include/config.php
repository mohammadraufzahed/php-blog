<?php
// Database informations
$dbServer = "localhost";
$dbName = "blog";
$dbUserName = "mohammad";
$dbPassword = "09351515982Mr@";
// Try to connect to database
try {
    $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", "$dbUserName", "$dbPassword");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection faild error will
    echo "Connection Faild " . $e->getMessage();
}
