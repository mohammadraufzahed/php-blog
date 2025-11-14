<?php

namespace App\Controllers;

use App\Container;
use App\Controller;
use Account\Register;
use Blog\Settings;
use Database\Mysql;
use Permission\AdminPermission;
use Post\Fetch;
use Post\Management;
use PDO;

class AdminController extends Controller
{
    private function checkPermission(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $permission = Container::make(AdminPermission::class);
        $permission->permissionAdmin();
    }

    public function index(): void
    {
        $this->checkPermission();

        // Get database from container
        $db = Container::get(Mysql::class);
        $db->query("SELECT `id` FROM `posts`");
        $db->execute();
        $totalPosts = $db->rowCount();

        $db->query("SELECT `id` FROM `users`");
        $db->execute();
        $totalUsers = $db->rowCount();

        $this->view('admin.index', [
            'totalPosts' => $totalPosts,
            'totalUsers' => $totalUsers
        ]);
    }

    public function posts(): void
    {
        $this->checkPermission();

        $posts = Container::make(Fetch::class);

        $this->view('admin.posts.index', [
            'posts' => $posts->posts
        ]);
    }

    public function newPost(): void
    {
        $this->checkPermission();
        $this->view('admin.posts.new');
    }

    public function createPost(): void
    {
        $this->checkPermission();

        if (isset($_POST["save"])) {
            $postTitle = trim($_POST["postName"] ?? '');
            $postBody = trim($_POST["postBody"] ?? '');
            $isPublished = trim($_POST["publishIt"] ?? 'N');

            $postManager = Container::make(Management::class);
            $postManager->addPost($postTitle, $postBody, $isPublished);
            // addPost redirects internally, so we don't need to do anything here
            return;
        }

        $this->redirect('/admin/posts/new');
    }

    public function editPost(array $vars): void
    {
        $this->checkPermission();

        $postId = intval($vars['id'] ?? 0);
        
        if ($postId <= 0) {
            $this->redirect('/admin/posts');
            return;
        }

        $postManager = Container::make(Management::class);
        $postManager->getPost($postId);

        // Convert to object for template
        $post = (object)[
            'id' => $postManager->postId,
            'title' => $postManager->postTitle,
            'body' => $postManager->postBody,
            'published' => $postManager->isPublished
        ];

        $this->view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function updatePost(array $vars): void
    {
        $this->checkPermission();

        if (isset($_POST["saveId"])) {
            $postTitle = trim($_POST["postName"] ?? '');
            $postBody = trim($_POST["postBody"] ?? '');
            $isPublished = trim($_POST["publishIt"] ?? 'N');
            $postId = intval($_POST["saveId"] ?? 0);

            if ($postId > 0) {
                $postManager = Container::make(Management::class);
                $postManager->updatePost($postTitle, $postBody, $isPublished, $postId);
                // updatePost redirects internally
                return;
            }
        }

        $this->redirect('/admin/posts');
    }

    public function deletePost(array $vars): void
    {
        $this->checkPermission();

        $postId = intval($vars['id'] ?? 0);
        
        if ($postId <= 0) {
            $this->redirect('/admin/posts');
            return;
        }

        $postManager = Container::make(Management::class);
        $postManager->deletePost($postId);
        // deletePost redirects internally
    }

    public function users(): void
    {
        $this->checkPermission();

        $db = Container::get(Mysql::class);
        $db->query("SELECT `id`, `username`, `email` FROM `users`");
        $db->execute();
        $users = $db->fetchAll();

        $this->view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function addUser(): void
    {
        $this->checkPermission();
        $this->view('admin.users.add');
    }

    public function createUser(): void
    {
        $this->checkPermission();

        if (isset($_POST["register"])) {
            $username = $_POST["username"] ?? '';
            $password = $_POST["password"] ?? '';
            $passwordConfirm = $_POST["passwordConfirm"] ?? '';

            $register = new Register($username, $password, $passwordConfirm, "/admin/users/add");
            if ($register->registerUser()) {
                $this->redirect('/admin/users/add?status=1');
                return;
            }
        }

        $this->redirect('/admin/users/add');
    }

    public function deleteUser(array $vars): void
    {
        $this->checkPermission();

        $userID = intval($vars['id'] ?? 0);
        
        if ($userID <= 0) {
            $this->redirect('/admin/users?deleteStatus=2');
            return;
        }

        $db = Container::get(Mysql::class);
        $db->query("DELETE FROM `users` WHERE `id`=:id AND `is_admin`='N'");
        $db->bind(":id", $userID, PDO::PARAM_INT);

        if ($db->execute()) {
            $this->redirect('/admin/users?deleteStatus=1');
        } else {
            $this->redirect('/admin/users?deleteStatus=2');
        }
    }

    public function settings(): void
    {
        $this->checkPermission();

        $settings = Container::make(Settings::class);

        $this->view('admin.settings', [
            'settings' => $settings
        ]);
    }

    public function updateSettings(): void
    {
        $this->checkPermission();

        if (isset($_POST["update"])) {
            $blogTitle = $_POST["blogName"] ?? '';
            $blogAuthor = $_POST["authorName"] ?? '';
            $blogAuthorInfo = $_POST["authorInfo"] ?? '';

            $settings = Container::make(Settings::class);
            $settings->updateSettings($blogTitle, $blogAuthor, $blogAuthorInfo);
            // updateSettings redirects internally
            return;
        }

        $this->redirect('/admin/settings');
    }
}
