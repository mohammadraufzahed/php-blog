<?php
require_once(__DIR__ . "/../../../include/config.php");
// Check the request method is get or not
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Store the received data
    $postId = $_GET['id'];
    // Send delete request to database
    $sql = "DELETE FROM `posts` WHERE `id`=$postId";
    $deletePost = $conn->prepare($sql);
    if ($deletePost->execute()) { ?>
        <script>
            alert("Post Deleted");
        </script>
<?php
        header('location: /admin/posts.php');
    }
}
