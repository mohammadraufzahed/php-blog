<?php
require_once(__DIR__ . "/../../../include/config.php");
// Define the needed variable
$blogTitle = "";
$blogAuthor = "";
$blogAuthorInfo = "";
// Send query to database
$currentSettings = $conn->prepare("SELECT `blogTitle`,`blogAuthor`,`blogAuthorInfo` FROM `settings`");
// Check query executed successfully
if (!$currentSettings->execute()) {
	die("Something goes wrong");
}
// Fetch a query
$currentSettings = $currentSettings->fetchAll(PDO::FETCH_OBJ);
// Assign the received data to variables
foreach ($currentSettings as $key => $value) {
	$blogTitle = $value->blogTitle;
	$blogAuthor = $value->blogAuthor;
	$blogAuthorInfo = $value->blogAuthorInfo;
}
