<?php

/**
 * Class Permission
 */
class Permission
{
	public function __construct()
	{
		session_start();
	}

	/**
	 * Admin panel permission manager
	 */
	public function permissionAdmin()
	{
		if ($_SESSION["isLogged"] !== true || $_SESSION["isAdmin"] !== "Y") {
			header("location: /");
			die();
		}
	}

	/**
	 * User panel permission manager
	 */
	public function permissionUser()
	{
		if ($_SESSION["isLogged"]) {
			header("location: /");
			die();
		}
	}
}
