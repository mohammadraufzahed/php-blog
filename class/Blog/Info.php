<?php

namespace Blog;

use Database\Mysql;

require_once __DIR__ . "/../../vendor/autoload.php";

/**
 * Class Blog
 */
class Info
{
	public string $blogTitle;
	public string $blogAuthor;
	public string $blogAuthorInfo;

	public function __construct(Mysql $db)
	{
		$db->query("SELECT `blogTitle`, `blogAuthor`, `blogAuthorInfo` FROM `settings`");
		$db->execute();
		$result = $db->fetch();

		$this->blogTitle = $result->blogTitle;
		$this->blogAuthor = $result->blogAuthor;
		$this->blogAuthorInfo = $result->blogAuthorInfo;
	}
}
