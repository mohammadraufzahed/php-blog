<?php

namespace Post;

use Database\Mysql;
use PDO;

require_once __DIR__ . "/../../vendor/autoload.php";

/**
 * Fetch Posts
 */
class Fetch
{
	public array $posts;
	private object $db;

	/**
	 * Post constructor.
	 */
	public function __construct()
	{
		$this->db = new Mysql();
		$this->fetchPosts();
	}

	/**
	 * Return the posts
	 * @return void
	 */
	private function fetchPosts(): void
	{
		// Send query
		$this->db->query("SELECT `id`, `title`, `body`, `published` FROM `posts`");
		// Execute the statement
		$this->db->execute();
		// Store the received post
		$this->posts = $this->db->fetchAll();
	}

	/**
	 * Return a post
	 * @param int $id
	 * @return object
	 */
	public function fetchPost(int $id): object
	{
		// Send query
		$this->db->query("SELECT `title`, `body` FROM `posts` WHERE `id`=:id");
		// Bind the data
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		// Execute the statement
		$this->db->execute();
		// Return the received data
		return $this->db->fetch();
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