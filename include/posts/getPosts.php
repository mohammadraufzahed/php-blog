<?php
require_once(__DIR__ . "/../config.php");
$posts = $conn->prepare("SELECT `id`, `title`, `body`, `published` FROM `posts`");
$posts->execute();
$posts = $posts->fetchAll(PDO::FETCH_OBJ);
function printPosts($postsArr)
{
    foreach ($postsArr as $key => $value) {
        if ($value->published == 'Y') { ?>
            <div class="posts bg-dark text-white text-center h-auto mb-3">
                <img class="img-fluid post-image" src="static/img/post.jpg" alt="Post image">
                <h3 class="post-title pt-3"><?php echo $value->title ?></h3>
                <p class="pt-3 pb-3 post-text text-start m-auto"><?php echo $value->body; ?>
                    <a class="link-primary text-end" href="post.php?id=<?php echo $value->id; ?>">Read more</a>
                </p>
            </div><?php
                }
            }
        }
