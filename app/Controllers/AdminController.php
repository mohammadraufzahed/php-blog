<?php

namespace App\Controllers;

use App\Controller;
use Permission\AdminPermission;

class AdminController extends Controller
{
    public function index(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        require __DIR__ . '/../../admin/index.php';
    }

    public function posts(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        require __DIR__ . '/../../admin/posts.php';
    }

    public function newPost(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        require __DIR__ . '/../../admin/posts/new.php';
    }

    public function createPost(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        // Handle POST request - redirect to posts list after creation
        $this->redirect('/admin/posts');
    }

    public function editPost(array $vars): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        $_GET['id'] = $vars['id'] ?? 0;
        require __DIR__ . '/../../admin/posts/edit.php';
    }

    public function updatePost(array $vars): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        // Handle POST request - redirect to posts list after update
        $this->redirect('/admin/posts');
    }

    public function deletePost(array $vars): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        $_GET['id'] = $vars['id'] ?? 0;
        require __DIR__ . '/../../admin/posts/delete.php';
    }

    public function users(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        require __DIR__ . '/../../admin/users.php';
    }

    public function addUser(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        require __DIR__ . '/../../admin/users/addUser.php';
    }

    public function deleteUser(array $vars): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        $_GET['id'] = $vars['id'] ?? 0;
        require __DIR__ . '/../../admin/users/deleteUser.php';
    }

    public function settings(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        require __DIR__ . '/../../admin/settings.php';
    }

    public function updateSettings(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = new AdminPermission();
        $permission->permissionAdmin();

        // Handle POST request - redirect back to settings
        $this->redirect('/admin/settings');
    }
}

