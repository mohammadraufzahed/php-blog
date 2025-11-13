<?php

namespace Post;

use Database\Mysql;
use PDO;

require_once __DIR__ . "/../../vendor/autoload.php";

/**
 * Class Posts
 */
class Management
{

	public int $postId;
	public string $postTitle;
	public string $postBody;
	public string $isPublished;
	private object $db;
	private int $userId;

	/**
	 * Posts constructor.
	 */
	public function __construct()
	{
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
		$this->userId = !empty($_SESSION["id"]) ? intval($_SESSION["id"]) : 0;
		$this->db = new Mysql();
	}

	/**
	 * Create new post in database
	 * @param string $title
	 * @param string $body
	 * @param string $isPublished
	 */
	public function addPost(string $title, string $body, string $isPublished): void
	{
		// Prepare the sql statement
		$this->db->query("INSERT INTO `posts` (`user_id`, `title`, `body`, `published`) VALUES (:userId, :postTitle, :postBody, :postPublish)");
		$this->db->bind(":userId", $this->userId, PDO::PARAM_INT);
		$this->db->bind(":postTitle", $title, PDO::PARAM_STR);
		$this->db->bind(":postBody", $body, PDO::PARAM_STR);
		$this->db->bind("postPublish", $isPublished, PDO::PARAM_STR_CHAR);

		// Execute the statement
		if ($this->db->execute()) {
			header("location: /admin/posts.php?newPostStatus=1");
			die();
		} else {
			header("location: /admin/posts.php?newPostStatus=2");
			die();
		}
	}

	/**
	 * Delete the post in database
	 * @param int $id
	 */
	public function deletePost(int $id): void
	{
		$this->db->query("DELETE FROM `posts` WHERE `id`=:postId");
		$this->db->bind(":postId", $id, PDO::PARAM_INT);

		if ($this->db->execute()) {
			header("location: /admin/posts.php?deletePostStatus=1");
			die();
		} else {
			header("location: /admin/posts.php?deletePostStatus=2");
			die();
		}
	}

	/**
	 * Get post
	 * @param int $id
	 */
	public function getPost(int $id): void
	{
		$this->db->query("SELECT `title`, `body`, `published` FROM `posts` WHERE `id`=:id");
		$this->db->bind(":id", $id, PDO::PARAM_INT);
		$this->db->execute();
		$result = $this->db->fetch();
		$this->postId = $id;
		$this->postTitle = $result->title;
		$this->postBody = $result->body;
		$this->isPublished = $result->published;
	}

	/**
	 * Update the post
	 * @param string $title
	 * @param string $body
	 * @param string $isPublished
	 * @param int $postId
	 */
	public function updatePost(string $title, string $body, string $isPublished, int $postId): void
	{
		$this->db->query("UPDATE `posts` SET `title` = :title, `body` = :body, `published` = :published WHERE `id` = :id");
		$this->db->bind(":title", $title, PDO::PARAM_STR);
		$this->db->bind(":body", $body, PDO::PARAM_STR);
		$this->db->bind(":published", $isPublished, PDO::PARAM_STR);
		$this->db->bind(":id", $postId, PDO::PARAM_INT);

		if ($this->db->execute()) {
			header("location: /admin/posts.php?updatePostStatus=1");
			die();
		} else {
			header("location: /admin/posts.php?updatePostStatus=2");
			die();
		}
	}

	/**
	 * Print messages received from request
	 * @param string $type
	 * @param int $errorCode
	 */
	public function printMessages(string $type, int $errorCode): void
	{
		$errorMessage = "";
		if ($type == "newPost") {
			switch ($errorCode) {
				case 1:
					$errorMessage = "Post Created Successfully";
					break;
				case 2:
					$errorMessage = "Something goes wrong";
					break;
			}
		} elseif ($type == "deletePost") {
			switch ($errorCode) {
				case 1:
					$errorMessage = "Post Deleted Successfully";
					break;
				case 2:
					$errorMessage = "Something goes wrong";
					break;
			}
		} elseif ($type == "updatePost") {
			switch ($errorCode) {
				case 1:
					$errorMessage = "Post Updated Successfully";
					break;
				case 2:
					$errorMessage = "Something goes wrong";
					break;
			}
		}
		?>
        <div class="pt-3 pb-3 text-center text-white bg-<?php echo ($errorCode == 1) ? "success" : "danger" ?> w-100 h-auto">
            <b><?php echo $errorMessage; ?></b>
        </div>
		<?php
	}
}