<!DOCTYPE html>
<html>
<head>
    <title>@yield("title")</title>
    @vite("resources/js/admin/admin.jsx")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.min.css"/>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100vh;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <h1 class="display-5">Admin</h1>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="/admin" class="nav-link active" aria-current="page">
                            <i class="fa-solid fa-house"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="/admin/products" class="nav-link link-dark">
                            <i class="fa-solid fa-box"></i> Products
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
            <div class="col p-3">
                <h2 class="display-6">@yield("header")</h2>
                @yield("content", "Nothing here but rabbits")
            </div>
        </div>  
    </div>
</body>
</html>