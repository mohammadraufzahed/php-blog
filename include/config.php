<?php
try {
    $conn = new PDO("mysql:host=localhost:3306;dbname=blog", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Faild " . $e->getMessage();
}
