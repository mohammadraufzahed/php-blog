<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="/admin" class="navbar-brand">Hello <?php echo $blogAuthor; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex w-auto flex-row-reverse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Settings
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item <?php echo ($_SERVER['PHP_SELF'] == "/admin/post") ? "active" : ""; ?>" href="/admin/post">Posts</a></li>
                            <li><a class="dropdown-item <?php echo ($_SERVER['PHP_SELF'] == "/admin/setting") ? "active" : ""; ?>" href="/admin/setting">Settings</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>