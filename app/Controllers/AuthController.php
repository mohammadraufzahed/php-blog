<?php

namespace App\Controllers;

use App\Controller;
use Account\Login;
use Account\Register;
use Permission\UserPermission;

class AuthController extends Controller
{
    public function showLogin(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new UserPermission();
        $permission->permissionUser();

        require __DIR__ . '/../../login.php';
    }

    public function login(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new UserPermission();
        $permission->permissionUser();

        if (isset($_POST["login"])) {
            $username = $_POST["username"] ?? '';
            $password = $_POST["password"] ?? '';
            $login = new Login($username, $password);
            $login->loginUser();
            $this->redirect('/');
        }

        $this->redirect('/login');
    }

    public function showRegister(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new UserPermission();
        $permission->permissionUser();

        require __DIR__ . '/../../register.php';
    }

    public function register(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new UserPermission();
        $permission->permissionUser();

        if (isset($_POST["register"])) {
            $username = $_POST["username"] ?? '';
            $password = $_POST["password"] ?? '';
            $passwordConfirm = $_POST["passwordConfirm"] ?? '';
            $register = new Register($username, $password, $passwordConfirm, "/register");
            if ($register->registerUser()) {
                $this->redirect('/login');
            }
        }

        $this->redirect('/register');
    }

    public function logout(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION["isLogged"])) {
            $this->redirect('/');
        }

        $_SESSION = array();
        session_destroy();
        $this->redirect('/login');
    }
}

