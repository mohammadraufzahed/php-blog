<?php

namespace App\Controllers;

use App\Controller;
use Post\Fetch;

class PostController extends Controller
{
    public function show(array $vars): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $postId = intval($vars['id'] ?? 0);
        
        if ($postId <= 0) {
            $this->redirect('/');
        }

        $postManager = new Fetch();
        $post = $postManager->fetchPost($postId);

        if (!$post) {
            $this->redirect('/');
        }

        // Set GET parameter for compatibility with existing post.php
        $_GET['id'] = $postId;
        require __DIR__ . '/../../post.php';
    }
}

