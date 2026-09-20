<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="app-shell container-fluid p-0">

    @if(session('success'))
        <div class="alert alert-success m-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="main-content">
        @yield('content')
    </div>

</div>

<style>
    body {
        margin: 0;
        background: #eef2f6;
        font-family: 'Segoe UI', sans-serif;
    }

    .app-shell {
        min-height: 100vh;
        background: #eef2f6;
    }

    .main-content {
        margin-left: 250px;
        min-height: 100vh;
    }

    @media (max-width: 991.98px) {
        .main-content {
            margin-left: 0;
        }
    }
</style>

</body>
</html>