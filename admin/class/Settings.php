<?php
require_once __DIR__ . "/../../class/Database.php";

/**
 * Class Settings
 */
class Settings
{
	public string $blogTitle;
	public string $blogAuthor;
	public string $blogAuthorInfo;

	private object $db;

	/**
	 * Settings constructor.
	 */
	public function __construct()
	{
		// Create database connection
		$this->db = new Database();
		// Get blog settings from database
		$this->db->query("SELECT `blogTitle`,`blogAuthor`,`blogAuthorInfo` FROM `settings`");
		$this->db->execute();
		$result = $this->db->fetch();
		// Assign the values
		$this->blogTitle = $result->blogTitle;
		$this->blogAuthor = $result->blogAuthor;
		$this->blogAuthorInfo = $result->blogAuthorInfo;
	}

	/**
	 * Update blog settings
	 * @param string $blogTitle
	 * @param string $blogAuthor
	 * @param string $blogAuthorInfo
	 */
	public function updateSettings(string $blogTitle, string $blogAuthor, string $blogAuthorInfo): void
	{
		// Send the query
		$this->db->query("UPDATE `settings` SET `blogTitle` = :blogTitle, `blogAuthor` = :blogAuthor, `blogAuthorInfo` = :blogAuthorInfo");
		$this->db->bind(":blogTitle", $blogTitle, PDO::PARAM_STR);
		$this->db->bind(":blogAuthor", $blogAuthor, PDO::PARAM_STR);
		$this->db->bind(":blogAuthorInfo", $blogAuthorInfo, PDO::PARAM_STR);
		// Execute the statement
		if ($this->db->execute()) {
			header("location: /admin/settings.php?updateStatus=1");
			die();
		} else {
			header("location: /admin/settings.php?updateStatus=2");
			die();
		}

	}
}