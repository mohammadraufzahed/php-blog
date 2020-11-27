<?php
// Define a info variables
$blogTitle;
$blogDescription;
$blogAuthor;
$blogAuthorInfo;
// Get values from database and put theme in variables
$siteInfo = $db->query("SELECT * FROM `settings`");
foreach ($siteInfo as $info) {
    $blogTitle = $info["blogTitle"];
    $blogDescription = $info["blogDescription"];
    $blogAuthor = $info["blogAuthor"];
    $blogAuthorInfo = $info["blogAuthorInfo"];
}
