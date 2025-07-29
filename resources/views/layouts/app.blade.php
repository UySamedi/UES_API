// resources/views/layouts/app.blade.php
<!DOCTYPE html>
<html>
<head>
    <title>University Enrollment System</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">University Enrollment</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
                @if (Auth::user() && Auth::user()->isAdmin())
                    <a class="nav-link" href="{{ route('enrollments.index') }}">Enrollments</a>
                @endif
            </div>
            // resources/views/layouts/app.blade.php (navigation part)
            <div class="navbar-nav ms-auto">
                @auth
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>