<?php
require_once __DIR__ . "/Database.php";

/**
 * Class Blog
 */
class Blog
{
	public $blogTitle;
	public $blogAuthor;
	public $blogAuthorInfo;

	public function __construct()
	{
		$db = new Database();
		$db->query("SELECT `blogTitle`, `blogAuthor`, `blogAuthorInfo` FROM `settings`");
		$db->execute();
		$result = $db->fetch();

		$this->blogTitle = $result->blogTitle;
		$this->blogAuthor = $result->blogAuthor;
		$this->blogAuthorInfo = $result->blogAuthorInfo;
	}
}
