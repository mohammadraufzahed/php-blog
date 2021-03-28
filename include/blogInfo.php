<?php
require(__DIR__ . "/config.php");
// Define the variables
$blogTitle = "";
$blogAuthor = "";
$blogAuthorInfo = "";
// Get data from Database
$dbArray = $conn->prepare("SELECT `blogTitle`, `blogAuthor`, `blogAuthorInfo` FROM `settings`");
$dbArray->execute();
$dbResult = $dbArray->fetchAll(PDO::FETCH_OBJ);
// Assign the data to variables
foreach ($dbResult as $value) {
    $blogTitle = $value->blogTitle;
    $blogAuthor = $value->blogAuthor;
    $blogAuthorInfo = $value->blogAuthorInfo;
}
