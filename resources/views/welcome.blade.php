{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">Student Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('student.index') }}">Students</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('teacher.index') }}">Teachers</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Courses</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('batches.index') }}">Batches</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('enrollments.index') }}">Enrollments</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('payments.index') }}">Payments</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('reports.index') }}">Reports</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center mt-5">
        <h1 class="display-4">Welcome to Student Management System</h1>
        <p class="lead">Manage Students, Teachers, Courses, Batches, Enrollments, Payments, and Reports easily.</p>

        @auth
            <div class="mt-4">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg me-2">Go to Dashboard</a>
                <a href="{{ route('profile.edit') }}" class="btn btn-secondary btn-lg">Edit Profile</a>
            </div>
        @else
            <div class="mt-4">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Register</a>
            </div>
        @endauth
    </div>

    <footer class="bg-light text-center mt-5 py-3">
        &copy; {{ date('Y') }} Student Management System
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
