<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <title>@yield('title', 'Student Management System')</title>

    <style>
        :root {
            --sidebar-width: 280px;
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #06b6d4;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --border-color: #e5e7eb;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--light-color);
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .sidebar-header h3 {
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0 1rem 0.5rem 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.875rem 1rem;
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .nav-link i {
            width: 20px;
            margin-right: 12px;
            text-align: center;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: var(--accent-color);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .nav-link.active::before,
        .nav-link:hover::before {
            transform: scaleY(1);
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Top Navigation */
        .top-navbar {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .top-navbar h1 {
            color: var(--dark-color);
            font-weight: 700;
            margin: 0;
            font-size: 1.75rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        /* Content Area */
        .content-area {
            padding: 2rem;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 16px 16px 0 0 !important;
            padding: 1.5rem;
            border: none;
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 0.75rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success-color), #059669);
            border: none;
            border-radius: 0.75rem;
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger-color), #dc2626);
            border: none;
            border-radius: 0.75rem;
        }

        .btn-logout {
            background: linear-gradient(135deg, var(--danger-color), #dc2626);
            border: none;
            color: white;
            padding: 0.875rem 1rem;
            border-radius: 0.75rem;
            font-weight: 500;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transform: translateY(-2px);
        }

        /* Mobile Responsiveness */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar-toggle {
                display: block;
            }
            
            .top-navbar {
                padding-left: 4rem;
            }
            
            .content-area {
                padding: 1rem;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100vw;
            }
            
            .top-navbar h1 {
                font-size: 1.25rem;
            }
            
            .sidebar-header h3 {
                font-size: 1.1rem;
            }
        }

        /* Scrollbar Styling */
        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 2px;
        }

        /* Admin Badge */
        .admin-badge {
            background: linear-gradient(135deg, var(--warning-color), #d97706);
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 1rem;
            margin-left: auto;
        }

        /* Table Improvements */
        .table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            font-weight: 600;
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            border-color: var(--border-color);
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: rgba(37, 99, 235, 0.05);
        }
    </style>
</head>
<body>
    <!-- Mobile Sidebar Toggle -->
    <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-graduation-cap me-2"></i>SMS Portal</h3>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </div>

            @auth
                <div class="nav-item">
                    <a href="{{ route('student.index') }}" class="nav-link {{ request()->routeIs('student.*') ? 'active' : '' }}">
                        <i class="fas fa-user-graduate"></i>
                        Students
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('teacher.index') }}" class="nav-link {{ request()->routeIs('teacher.*') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Teachers
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('courses.index') }}" class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i>
                        Courses
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('batches.index') }}" class="nav-link {{ request()->routeIs('batches.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        Batches
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('enrollments.index') }}" class="nav-link {{ request()->routeIs('enrollments.*') ? 'active' : '' }}">
                        <i class="fas fa-user-plus"></i>
                        Enrollments
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('payments.index') }}" class="nav-link {{ request()->routeIs('payments.*') ? 'active' : '' }}">
                        <i class="fas fa-credit-card"></i>
                        Payments
                    </a>
                </div>
                
                @if(auth()->user() && auth()->user()->is_admin)
                    <div class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                            <i class="fas fa-cogs"></i>
                            Admin Panel
                            <span class="admin-badge">ADMIN</span>
                        </a>
                    </div>
                @endif
                
                <div class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                        <i class="fas fa-user-edit"></i>
                        Profile
                    </a>
                </div>

                <div class="nav-item mt-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}">
                        <i class="fas fa-user-plus"></i>
                        Register
                    </a>
                </div>
            @endguest
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <div class="top-navbar d-flex justify-content-between align-items-center">
            <h1>@yield('page-title', 'Dashboard')</h1>
            
            @auth
                <div class="user-info">
                    <div class="text-end d-none d-sm-block">
                        <div class="fw-semibold">{{ auth()->user()->name }}</div>
                        <small class="text-muted">{{ auth()->user()->email }}</small>
                    </div>
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </div>
            @endauth
        </div>

        <!-- Content Area -->
        <div class="content-area">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.sidebar-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });

        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>

    @stack('scripts')
</body>
</html>
