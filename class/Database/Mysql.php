<?php

namespace Database;

use PDO;
use PDOException;

/**
 * Class Database
 */
class Mysql
{
	private const DB_HOST = "localhost";
	private const DB_NAME = "php_blog";
	private const DB_USER = "root";
	private const DB_PASS = "";

	private ?PDO $db = null;
	private ?\PDOStatement $stmt = null;

	public function __construct()
	{
		// Use environment variables if available (for Docker), otherwise use constants
		$host = getenv('DB_HOST') ?: self::DB_HOST;
		$name = getenv('DB_NAME') ?: self::DB_NAME;
		$user = getenv('DB_USER') ?: self::DB_USER;
		$pass = getenv('DB_PASS') ?: self::DB_PASS;

		try {
			$this->db = new PDO("mysql:host=" . $host . ";dbname=" . $name . ";charset=utf8", $user, $pass);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			// Don't output errors directly to avoid header issues
			// Log error instead (in production, use proper logging)
			error_log("Database connection error: " . $e->getMessage());
			// Throw exception to be handled by calling code
			throw new PDOException("Database connection failed", 0, $e);
		}
	}

	/**
	 * Prepare sql statement
	 * @param string $sql
	 * @return void
	 */
	public function query(string $sql): void
	{
		$this->stmt = $this->db->prepare($sql);
	}

	/**
	 * Bind data to sql prepared statement
	 * @param string $param
	 * @param mixed $value
	 * @param int $type
	 * @return void
	 */
	public function bind(string $param, mixed $value, int $type): void
	{
		$this->stmt->bindParam($param, $value, $type);
	}

	/**
	 * Execute the statement
	 * @return bool
	 */
	public function execute(): bool
	{
		if ($this->stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Fetch the data as object from statement
	 * @return object|false
	 */
	public function fetch(): object|false
	{
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	/**
	 * Fetch all data from statement
	 * @return array
	 */
	public function fetchAll(): array
	{
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/**
	 * Return the number of the affected rows
	 * @return int
	 */
	public function rowCount(): int
	{
		return $this->stmt->rowCount();
	}

	public function __destruct()
	{
		$this->db = null;
		$this->stmt = null;
	}
}