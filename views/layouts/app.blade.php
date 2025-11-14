<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', $blog->blogTitle ?? 'Blog')</title>
    <!--Load the css-->
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/style.css">
    @stack('styles')
</head>
<body class="bg-light">
    @include('partials.nav')
    
    @yield('content')
    
    <!--Load The js files-->
    <script src="/static/js/jquery.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    @stack('scripts')
</body>
</html>

