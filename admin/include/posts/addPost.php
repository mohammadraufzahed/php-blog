<?php
require_once(__DIR__ . "/../../../include/config.php");
session_start();
// Check the request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save the received data to variables
    $postTitle = trim($_POST["postName"]);
    $postPublish = trim(($_POST["publishIt"] == 1) ? 'Y' : 'N');
    $postBody = trim($_POST["postBody"]);
    $userId = $_SESSION["id"];
    // Send the insert request to database
    $sql = "INSERT INTO `posts` (user_id, `title`, `body`, `published`) VALUES (:userId, :postTitle, :postBody, :postPublish)";
    $savePost = $conn->prepare($sql);
    $savePost->bindParam(":userId", $userId, PDO::PARAM_INT);
    $savePost->bindParam(":postTitle", $postTitle, PDO::PARAM_STR);
    $savePost->bindParam(":postBody", $postBody, PDO::PARAM_STR);
    $savePost->bindParam("postPublish", $postPublish, PDO::PARAM_STR_CHAR);

    // Check the request executed successfully
    if ($savePost->execute()) {
?>
        <script>
            alert("Post Added");
        </script>
<?php    }
}
