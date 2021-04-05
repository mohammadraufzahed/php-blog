<?php
require_once __DIR__ . "/Database.php";

/**
 * Class Post
 */
class Post
{
	public array $posts;
	private object $db;

	/**
	 * Post constructor.
	 */
	public function __construct()
	{
		$this->db = new Database();
		$this->getPosts();
	}

	/**
	 * Return the posts
	 */
	private function getPosts()
	{
		$this->db->query("SELECT `id`, `title`, `body`, `published` FROM `posts`");
		$this->db->execute();
		$this->posts = $this->db->fetchAll();
	}

	/**
	 * Return a post
	 * @param int $id
	 * @return array
	 */
	public function getPost(int $id): object
	{
		$this->db->query("SELECT `title`, `body` FROM `posts` WHERE `id`=:id");
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		$this->db->execute();
		$result = $this->db->fetch();
		return $result;
	}

	/**
	 * Print the posts
	 */
	public function printPosts(): void
	{
		foreach ($this->posts as $value) {
			if ($value->published == 'Y') { ?>
                <div class="posts bg-dark text-white text-center h-auto mb-3">
                    <img class="img-fluid post-image" src="static/img/post.jpg" alt="Post image">
                    <h3 class="post-title pt-3"><?php echo $value->title ?></h3>
                    <p class="pt-3 pb-3 post-text text-start m-auto"><?php echo $value->body; ?>
                        <a class="link-primary text-end" href="post.php?id=<?php echo $value->id; ?>">Read more</a>
                    </p>
                </div>
				<?php
			}
		}
	}
}