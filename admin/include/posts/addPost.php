<?php
require(__DIR__ . "/../../../include/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postTitle = trim($_POST["postName"]);
    $postPublish = trim(($_POST["publishIt"] == 1) ? 'Y' : 'N');
    $postBody = trim($_POST["postBody"]);
    $sql = "INSERT INTO `posts` (user_id, `title`, `body`, `published`) VALUES (1, '$postTitle', '$postBody', '$postPublish')";
    if ($conn->exec($sql)) {
?>
        <script>
            alert("Post Added");
        </script>
<?php    }
}
