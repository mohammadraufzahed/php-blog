<?php

namespace Permission;

/**
 * Class Admin Permission
 */
class AdminPermission
{
	public function __construct()
	{
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
	}

	/**
	 * Admin panel permission manager
	 */
	public function permissionAdmin()
	{
		if (empty($_SESSION["isLogged"]) || $_SESSION["isLogged"] !== true || empty($_SESSION["isAdmin"]) || $_SESSION["isAdmin"] !== "Y") {
			\App\Helpers\Redirect::to('/');
		}
	}
}
