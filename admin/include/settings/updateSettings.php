<?php
require_once(__DIR__ . "/../../../include/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store the needed data to variables
    $newBlogTitle = $_POST["blogName"];
    $newBlogAuthor = $_POST["authorName"];
    $newBlogAuthorInfo = $_POST["authorInfo"];
    // Send the update request to database
    $sql = "UPDATE `settings` SET `blogTitle` = '$newBlogTitle', `blogAuthor` = '$newBlogAuthor', `blogAuthorInfo` = '$newBlogAuthorInfo'";
    $update = $conn->prepare($sql);
    // Check request executed successfully
    if ($update->execute()) { ?>
        <script>
            alert("Settings updated");
        </script>
<?php }
}
