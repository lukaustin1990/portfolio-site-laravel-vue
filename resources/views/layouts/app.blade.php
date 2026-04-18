<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield("title", "My Laravel App")</title>
    @vite(["resources/js/app.jsx"]) 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    @include("partials.header")

    <main class="container">
        @yield("content")
    </main>

    @include("partials.footer") 
</body>
</html>
