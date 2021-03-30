<?php
require_once(__DIR__ . "/../../../include/config.php");
// Check the request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store the needed data to variables
    $newBlogTitle = $_POST["blogName"];
    $newBlogAuthor = $_POST["authorName"];
    $newBlogAuthorInfo = $_POST["authorInfo"];
    // Send the update request to database
    $sql = "UPDATE `settings` SET `blogTitle` = :blogTitle, `blogAuthor` = :blogAuthor, `blogAuthorInfo` = :blogAuthorInfo";
    $update = $conn->prepare($sql);
    $update->bindParam(":blogTitle", $newBlogTitle, PDO::PARAM_STR);
    $update->bindParam(":blogAuthor", $newBlogAuthor, PDO::PARAM_STR);
    $update->bindParam(":blogAuthorInfo", $newBlogAuthorInfo, PDO::PARAM_STR);

    // Check request executed successfully
    if ($update->execute()) { ?>
        <script>
            alert("Settings updated");
        </script>
<?php }
}
