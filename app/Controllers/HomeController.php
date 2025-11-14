<?php

namespace App\Controllers;

use App\Container;
use App\Controller;
use Blog\Info;
use Post\Fetch;

class HomeController extends Controller
{
    public function index(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Get instances from container (with auto-wired dependencies)
        $blog = Container::make(Info::class);
        $postManager = Container::make(Fetch::class);

        // Filter published posts
        $publishedPosts = array_filter($postManager->posts, fn($post) => $post->published === 'Y');

        $this->view('home.index', [
            'blog' => $blog,
            'publishedPosts' => $publishedPosts
        ]);
    }
}

