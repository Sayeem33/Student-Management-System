@extends('layout')

@section('title', 'Dashboard - Student Management System')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="mb-3">
                            <i class="fas fa-tachometer-alt me-2 text-primary"></i>
                            Welcome to Student Management System
                        </h2>
                        <p class="lead text-muted mb-4">
                            Manage your educational institution efficiently with our comprehensive system.
                        </p>
                        
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            You're logged in successfully! Start managing your institution.
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="display-1 text-primary mb-3">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4 class="text-muted">Education Made Simple</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-3 mb-4">
        <div class="card h-100 text-center border-0 shadow-sm">
            <div class="card-body">
                <div class="display-4 text-primary mb-3">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h5 class="card-title">Students</h5>
                <p class="text-muted">Manage student information and records</p>
                <a href="{{ route('student.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-1"></i>
                    View Students
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card h-100 text-center border-0 shadow-sm">
            <div class="card-body">
                <div class="display-4 text-success mb-3">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h5 class="card-title">Teachers</h5>
                <p class="text-muted">Manage faculty and teaching staff</p>
                <a href="{{ route('teacher.index') }}" class="btn btn-success">
                    <i class="fas fa-arrow-right me-1"></i>
                    View Teachers
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card h-100 text-center border-0 shadow-sm">
            <div class="card-body">
                <div class="display-4 text-info mb-3">
                    <i class="fas fa-book"></i>
                </div>
                <h5 class="card-title">Courses</h5>
                <p class="text-muted">Manage course curriculum and content</p>
                <a href="{{ route('courses.index') }}" class="btn btn-info">
                    <i class="fas fa-arrow-right me-1"></i>
                    View Courses
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card h-100 text-center border-0 shadow-sm">
            <div class="card-body">
                <div class="display-4 text-warning mb-3">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="card-title">Batches</h5>
                <p class="text-muted">Organize students into batches</p>
                <a href="{{ route('batches.index') }}" class="btn btn-warning">
                    <i class="fas fa-arrow-right me-1"></i>
                    View Batches
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-user-plus me-2"></i>
                    Enrollment Management
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted">Handle student enrollments and course registrations efficiently.</p>
                <div class="d-grid">
                    <a href="{{ route('enrollments.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-list me-2"></i>
                        Manage Enrollments
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-credit-card me-2"></i>
                    Payment Management
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted">Track and manage student payments and financial records.</p>
                <div class="d-grid">
                    <a href="{{ route('payments.index') }}" class="btn btn-outline-success">
                        <i class="fas fa-dollar-sign me-2"></i>
                        Manage Payments
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@if(auth()->user() && auth()->user()->is_admin)
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-warning">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">
                    <i class="fas fa-crown me-2"></i>
                    Administrator Panel
                </h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6>System Administration</h6>
                        <p class="text-muted mb-0">Access advanced system settings and user management features.</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('admin.index') }}" class="btn btn-warning">
                            <i class="fas fa-cogs me-2"></i>
                            Admin Panel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="text-muted">Quick Actions</h5>
                <div class="btn-group flex-wrap" role="group">
                    <a href="{{ route('student.create') }}" class="btn btn-outline-primary">
                        <i class="fas fa-plus me-1"></i>
                        Add Student
                    </a>
                    <a href="{{ route('teacher.create') }}" class="btn btn-outline-success">
                        <i class="fas fa-plus me-1"></i>
                        Add Teacher
                    </a>
                    <a href="{{ route('courses.create') }}" class="btn btn-outline-info">
                        <i class="fas fa-plus me-1"></i>
                        Add Course
                    </a>
                    <a href="{{ route('batches.create') }}" class="btn btn-outline-warning">
                        <i class="fas fa-plus me-1"></i>
                        Add Batch
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
