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
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
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
			\App\Helpers\Redirect::to('/');
		}
	}
}
