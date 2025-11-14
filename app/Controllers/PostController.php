<?php

namespace App\Controllers;

use App\Container;
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

        $postManager = Container::make(Fetch::class);
        $post = $postManager->fetchPost($postId);

        if (!$post) {
            $this->redirect('/');
        }

        // Add id to post object for template
        $post->id = $postId;

        $this->view('post.show', [
            'post' => $post
        ]);
    }
}

