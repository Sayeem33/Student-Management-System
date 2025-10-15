<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Student Management</title>

    <style>
      /* Sidebar styles */
      .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
      }
      .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
      }
      .sidebar a.active {
        background-color: #04AA6D;
        color: white;
      }
      .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
      }
      div.content {
        margin-left: 200px;
        padding: 1px 16px;
        min-height: 100vh;
      }
      @media screen and (max-width: 700px) {
        .sidebar { width: 100%; height: auto; position: relative; }
        .sidebar a { float: left; }
        div.content { margin-left: 0; }
      }
      @media screen and (max-width: 400px) {
        .sidebar a { text-align: center; float: none; }
      }
    </style>
</head>
<body>
   <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <a class="navbar-brand" href="#"><h2>Student Management System</h2></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar -->
            <div class="sidebar">
                <a class="active" href="{{ url('/') }}">Home</a>

                @auth
                    <a href="{{ route('student.index') }}">Student</a>
                    <a href="{{ route('teacher.index') }}">Teacher</a>
                    <a href="{{ route('courses.index') }}">Courses</a>
                    <a href="{{ route('batches.index') }}">Batches</a>
                    <a href="{{ route('enrollments.index') }}">Enrollments</a>
                    <a href="{{ route('payments.index') }}">Payments</a>
                    <a href="{{ route('profile.edit') }}">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger mt-2 w-100">Logout</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endguest
                @if(auth()->user()->is_admin)
                <a href="{{ route('admin.index') }}">Admin Panel</a>
                 @endif

            </div>
        </div>

        <div class="col-md-9">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-MrcW6ZMFYV7m+nq64vOTi5XtA2e0F2Aq34LO6obJjR3p2O0+nV+zGQfElY6DkF8A" crossorigin="anonymous"></script>
</body>
</html>
