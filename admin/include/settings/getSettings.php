<?php
include(__DIR__ . "/../../../include/config.php");
$blogTitle;
$blogAuthor;
$blogAuthorInfo;
$currentSettings = $conn->query("SELECT `blogTitle`,`blogAuthor`,`blogAuthorInfo` FROM `settings`");
foreach ($currentSettings as $key => $value) {
    $blogTitle = $value["blogTitle"];
    $blogAuthor = $value["blogAuthor"];
    $blogAuthorInfo = $value["blogAuthorInfo"];
}
