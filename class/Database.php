<?php

/**
 * Class Database
 */
class Database
{
	private const DB_HOST = "localhost";
	private const DB_NAME = "blog";
	private const DB_USER = "mohammad";
	private const DB_PASS = "09351515982Mr@";

	private $db;
	private $stmt;
	private $error;

	public function __construct()
	{
		try {
			$this->db = new PDO("mysql:host=" . $this::DB_HOST . ";dbname=" . $this::DB_NAME . ";charset utf8", $this::DB_USER, $this::DB_PASS);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo $e->getMessage();
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
	 * @param string $value
	 * @param int $type
	 * @return void
	 */
	public function bind(string $param, string $value, int $type)
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
	 * @return object
	 */
	public function fetch(): object
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
		{
			$this->db = null;
		}
	}
}
