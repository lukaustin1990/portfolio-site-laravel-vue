<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">My Laravel App</a>
        <div>
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
            </ul>
        </div>
        <div class="d-flex">
        <?php if (auth()->check()): ?>
            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle" type="button" id="account-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i> {{ auth()->user()->email }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="account-dropdown">
                    <li>
                        <x-form-logout />
                    </li>
                </ul>
            </div>
        <?php else: ?>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#bs-modal-login">Log In</button>
        <?php endif; ?>
        </div>
    </div>
</nav>