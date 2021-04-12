<?php

namespace Account;

require_once __DIR__ . "/../../vendor/autoload.php";

use Database\Mysql;
use PDO;

/**
 * Class Login
 */
class Login
{
	private string $username;
	private string $password;
	private int $userId;
	private string $isAdmin;

	/**
	 * Login constructor.
	 * @param string $username
	 * @param string $password
	 */
	public function __construct(string $username, string $password)
	{
		$this->username = trim($username);
		$this->password = trim($password);
	}

	/**
	 * Login the user
	 * @return void
	 */
	public function loginUser()
	{
		$this->verifyStandard();
		$this->verifyPassword();
		// save the user
		session_start();
		$_SESSION["isLogged"] = true;
		$_SESSION["username"] = $this->username;
		$_SESSION["id"] = $this->userId;
		$_SESSION["isAdmin"] = $this->isAdmin;
	}

	/**
	 * Verify Standard
	 * @return void
	 */
	private function verifyStandard()
	{
		// Review the data
		if (empty($this->username) || empty($this->password)) {
			header("location: /login.php?error=1");
			die();
		}
	}

	/**
	 * Verify the password
	 * @return void
	 */
	private function verifyPassword()
	{
		// Create database connection
		$db = new Mysql();
		// Send query
		$db->query("SELECT `id`, `password`, `is_admin` FROM `users` WHERE username=:username");
		$db->bind(":username", $this->username, PDO::PARAM_STR);
		$db->execute();
		$result = $db->fetch();
		// Check the user is found or not
		if ($db->rowCount() !== 1) {
			header("location: /login.php?error=2");
			die();
		}
		if (password_verify($this->password, $result->password)) {
			$this->userId = intval($result->id);
			$this->isAdmin = $result->is_admin;
		} else {
			header("location: /login.php?error=3");
			die();
		}
	}
}
