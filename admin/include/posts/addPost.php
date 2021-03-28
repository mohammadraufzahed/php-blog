<?php
require_once(__DIR__ . "/../../../include/config.php");
// Check the request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save the received data to variables
    $postTitle = trim($_POST["postName"]);
    $postPublish = trim(($_POST["publishIt"] == 1) ? 'Y' : 'N');
    $postBody = trim($_POST["postBody"]);
    // Send the insert request to database
    $sql = "INSERT INTO `posts` (user_id, `title`, `body`, `published`) VALUES (1, '$postTitle', '$postBody', '$postPublish')";
    $savePost = $conn->prepare($sql);
    // Check the request executed successfully
    if ($savePost->execute()) {
?>
        <script>
            alert("Post Added");
        </script>
<?php    }
}
