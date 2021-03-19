<?php
require(__DIR__ . "/../../../include/config.php");
$postId;
$post = [];
$postTitle = "";
$postPublished = "";
$postBody = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $postId = $_GET['id'];
    $post = $conn->query("SELECT `title`, `body`, `published` FROM posts WHERE id=$postId");
    foreach ($post as $key => $value) {
        $postTitle = $value["title"];
        $postBody = $value["body"];
        $postPublished = $value["published"];
    };
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postId = $_POST["saveId"];
    $postTitle = $_POST["postName"];
    $postBody = $_POST["postBody"];
    $postPublished = ($_POST["publishIt"] == 1) ? 'Y' : 'N';
    $sql = "UPDATE `posts` SET `title`='$postTitle', `body`='$postBody', `published`='$postPublished' WHERE `id`=$postId";
    if ($conn->exec($sql)) { ?>
        <script>
            alert("Post Deleted");
        </script>
<?php
        header('location: /admin/posts.php');
    }
}
