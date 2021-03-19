<?php
require(__DIR__ . "/../../../include/config.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $postId = $_GET['id'];
    $sql = "DELETE FROM `posts` WHERE `id`=$postId";
    if ($conn->exec($sql)) { ?>
        <script>
            alert("Post Deleted");
        </script>
<?php
        header('location: /admin/posts.php');
    }
}
