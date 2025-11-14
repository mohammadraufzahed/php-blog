<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    // Home page
    $r->addRoute('GET', '/', 'HomeController@index');
    // Authentication routes
    $r->addRoute('GET', '/login', 'AuthController@showLogin');
    $r->addRoute('POST', '/login', 'AuthController@login');
    $r->addRoute('GET', '/register', 'AuthController@showRegister');
    $r->addRoute('POST', '/register', 'AuthController@register');
    $r->addRoute('GET', '/logout', 'AuthController@logout');

    // Post routes
    $r->addRoute('GET', '/post/{id:\d+}', 'PostController@show');

    // Admin routes
    $r->addGroup('/admin', function (RouteCollector $r) {
        $r->addRoute('GET', '', 'AdminController@index');
        $r->addRoute('GET', '/', 'AdminController@index');
        $r->addRoute('GET', '/posts', 'AdminController@posts');
        $r->addRoute('GET', '/posts/new', 'AdminController@newPost');
        $r->addRoute('POST', '/posts/new', 'AdminController@createPost');
        $r->addRoute('GET', '/posts/{id:\d+}/edit', 'AdminController@editPost');
        $r->addRoute('POST', '/posts/{id:\d+}/edit', 'AdminController@updatePost');
        $r->addRoute('POST', '/posts/{id:\d+}/delete', 'AdminController@deletePost');
        $r->addRoute('GET', '/users', 'AdminController@users');
        $r->addRoute('GET', '/users/add', 'AdminController@addUser');
        $r->addRoute('POST', '/users/add', 'AdminController@createUser');
        $r->addRoute('POST', '/users/{id:\d+}/delete', 'AdminController@deleteUser');
        $r->addRoute('GET', '/settings', 'AdminController@settings');
        $r->addRoute('POST', '/settings', 'AdminController@updateSettings');
    });
};

