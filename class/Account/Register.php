<?php

namespace Account;

use Database\Mysql;
use PDO;

require_once __DIR__ . "/../../vendor/autoload.php";

/**
 * Class Register
 */
class Register
{
	private string $username;
	private string $password;
	private string $passwordConfirm;
	private string $passwordHash;
	private string $baseUri;

	/**
	 * Register constructor.
	 * @param string $username
	 * @param string $password
	 * @param string $passwordConfirm
	 * @param string $baseUri
	 */
	public function __construct(string $username, string $password, string $passwordConfirm, string $baseUri)
	{
		$this->username = trim($username);
		$this->password = trim($password);
		$this->passwordConfirm = trim($passwordConfirm);
		$this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$this->baseUri = $baseUri;
	}

	/**
	 * Print Errors
	 * @param int $error
	 */
	public static function printError(int $error): void
	{
		$errorMessage = "";
		switch ($error) {
			case 1:
				$errorMessage = "Username field is empty";
				break;
			case 2:
				$errorMessage = "Username contains forbidden symbols (~!@#$%^&*()_+)";
				break;
			case 3:
				$errorMessage = "Passwords field is empty";
				break;
			case 4:
				$errorMessage = "Passwords does not match";
				break;
			case 5:
				$errorMessage = "User exists";
				break;
		}
		?>
        <div class="pt-3 pb-3 text-center text-white bg-danger w-100 h-auto">
            <b><?php echo $errorMessage; ?></b>
        </div>
		<?php
	}

	/**
	 * Register the user
	 * @return bool
	 */
	public function registerUser(): bool
	{
		$this->verifyStandard();
		$this->verifyDatabase();
		return $this->registerUserInDatabase();
	}

	/**
	 * Verify data standard
	 * @return void
	 */
	private function verifyStandard()
	{
		// Check the username is empty or not
		if (empty($this->username)) {
			header("location: /" . $this->baseUri . "?error=1");
			die();
		}
		// Check the username is contain forbidden symbols
		$banedSymbols = ["~", "!", "@", "#", "$", "%", "^", "&", "*", "_", "+", "."];
		foreach ($banedSymbols as $value) {
			if (strpos($this->username, $value)) {
				header("location: /" . $this->baseUri . "?error=2");
				die();
			}
		}
		// Check the password and passwordConfirm are empty or not
		if (empty($this->password) || empty($this->passwordConfirm)) {
			header("location: /" . $this->baseUri . "?error=3");
			die();
		}
		// Check the password and passwordConfirm to be equal
		if ($this->password !== $this->passwordConfirm) {
			header("location: /" . $this->baseUri . "?error=4");
			die();
		}
	}

	/**
	 * Verify data with database
	 * @return void
	 */
	private function verifyDatabase()
	{
		// Create database connection
		$db = new Mysql();
		// Send query to database
		$db->query("SELECT * FROM `users` WHERE username=:username");
		$db->bind(":username", $this->username, PDO::PARAM_STR);
		$db->execute();

		// Check how many user found
		if ($db->rowCount()) {
			header("location: /" . $this->baseUri . "?error=5");
			die();
		}
	}

	/**
	 * Register user in database
	 * @return bool
	 */
	private function registerUserInDatabase(): bool
	{
		// Create database connection
		$db = new Mysql();
		// Send query to database
		$db->query("INSERT INTO `users`(`username`, `password`) VALUES (:username, :password)");
		$db->bind(":username", $this->username, PDO::PARAM_STR);
		$db->bind(":password", $this->passwordHash, PDO::PARAM_STR);
		if ($db->execute()) {
			return true;
		} else {
			return false;
		}
	}
}