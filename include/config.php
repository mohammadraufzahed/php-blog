<?php
// Database informations
define("DB_HOST", "localhost");
define("DB_NAME", "blog");
define("DB_USER", "mohammad");
define("DB_PASS", "09351515982Mr@");
// Try to connect to database
$conn = '';
try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=".DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection failed error will
    echo "Connection Failed " . $e->getMessage();
}
