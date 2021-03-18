<?php
require("include/config.php");
$blogTitle = "";
$blogAuthor = "";
$blogAuthorInfo = "";
$dbArray = $conn->query("SELECT `blogTitle`, `blogAuthor`, `blogAuthorInfo` FROM `settings`");
foreach ($dbArray as $value) {
    $blogTitle = $value["blogTitle"];
    $blogAuthor = $value["blogAuthor"];
    $blogAuthorInfo = $value["blogAuthorInfo"];
}
