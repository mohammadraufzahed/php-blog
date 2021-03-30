<?php
require(__DIR__ . "/../../../include/config.php");
// Define the needed variables
$postId = 0;
$postTitle = "";
$postPublished = "";
$postBody = "";
// Check the request method is get or not
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Save the received data
    $postId = $_GET['id'];
    // Send query to database
    $post = $conn->prepare("SELECT `title`, `body`, `published` FROM posts WHERE id=:postId");
    $post->bindParam(":postId", $postId, PDO::PARAM_INT);
    $post->execute();
    $post = $post->fetchAll(PDO::FETCH_OBJ);
    foreach ($post as $key => $value) {
        $postTitle = $value->title;
        $postBody = $value->body;
        $postPublished = $value->published;
    };
}
// Check the request method is post or not
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store the received data to variables
    $postId = $_POST["saveId"];
    $postTitle = $_POST["postName"];
    $postBody = $_POST["postBody"];
    $postPublished = ($_POST["publishIt"] == 1) ? 'Y' : 'N';
    // Send update request to database
    $sql = "UPDATE `posts` SET `title`=:postTitle, `body`=:postBody, `published`=:postPublished WHERE `id`=:postId";
    $updatePost = $conn->prepare($sql);
    $updatePost->bindParam(":postTitle", $postTitle, PDO::PARAM_STR);
    $updatePost->bindParam(":postBody", $postBody, PDO::PARAM_STR);
    $updatePost->bindParam(":postPublished", $postPublished, PDO::PARAM_STR);
    $updatePost->bindParam(":postId", $postId, PDO::PARAM_INT);
    // Check request executed successfully
    if ($updatePost->execute()) { ?>
        <script>
            alert("Post Updated");
        </script>
<?php
        header('location: /admin/posts.php');
    }
}
