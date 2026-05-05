<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield("title", "My Laravel App")</title>
    @vite(["resources/js/app.js"])
    @vite(["resources/css/app.css"])
</head>
<body>
    <x-layout-header />

    <main class="container py-3">
        {{ $slot }}
    </main>

    <x-layout-footer />

    <?php if (!Auth::Check()): ?>
        <x-bs-modal-login />
        <x-bs-modal-signup />
        @vite(['resources/js/submit-login.js', 'resources/js/submit-signup.js'])
    <?php else: ?>
        @vite(['resources/js/submit-logout.js'])
    <?php endif; ?>
    <x-bs-modal-message />
    <x-bs-modal-basket />
</body>
</html>