<?php
include(__DIR__ . "/../../../include/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newBlogTitle = $_POST["blogName"];
    $newBlogAuthor = $_POST["authorName"];
    $newBlogAuthorInfo = $_POST["authorInfo"];
    $sql = "UPDATE `settings` SET `blogTitle` = '$newBlogTitle', `blogAuthor` = '$newBlogAuthor', `blogAuthorInfo` = '$newBlogAuthorInfo'";
    if ($conn->exec($sql)) { ?>
        <script>
            alert("Settings updated");
        </script>
<?php }
}
