<?php

namespace Permission;

/**
 * Class Admin Permission
 */
class AdminPermission
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
}
