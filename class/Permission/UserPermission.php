<?php

namespace Permission;

/**
 * Class User Permission
 */
class UserPermission
{
	private bool $isLogged;

	public function __construct()
	{
		session_start();
		if (isset($_SESSION["isLogged"])) {
			$this->isLogged = $_SESSION["isLogged"];
		} else {
			$this->isLogged = false;
		}
	}

	/**
	 * User panel permission manager
	 */
	public function permissionUser()
	{
		if ($this->isLogged) {
			header("location: /");
			die();
		}
	}
}
