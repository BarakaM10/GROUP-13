<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Capstone App</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <!-- Other nav items omitted for brevity -->
                    <li><a class="nav-link" href="{{ route('participants.index') }}">Participants</a></li>
                    <li><a class="nav-link" href="{{ route('outcomes.index') }}">Outcomes</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>