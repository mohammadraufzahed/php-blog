<?php

namespace Blog;

use Database\Mysql;

require_once __DIR__ . "/../../vendor/autoload.php";

/**
 * Class Blog
 */
class Info
{
	public $blogTitle;
	public $blogAuthor;
	public $blogAuthorInfo;

	public function __construct()
	{
		$db = new Mysql();
		$db->query("SELECT `blogTitle`, `blogAuthor`, `blogAuthorInfo` FROM `settings`");
		$db->execute();
		$result = $db->fetch();

		$this->blogTitle = $result->blogTitle;
		$this->blogAuthor = $result->blogAuthor;
		$this->blogAuthorInfo = $result->blogAuthorInfo;
	}
}
