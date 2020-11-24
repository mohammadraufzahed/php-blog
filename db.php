<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'mohammadraufzahed');
define('DB_PASS', '09351515982');
define('DB_NAME', 'blog');
// Connect to the database with PDO
try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Echo the error if connection faild
    echo $e->getMessage();
}
