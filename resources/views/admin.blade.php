@extends('layout')

@section('title', 'Admin Panel - User Management')
@section('page-title', 'Admin Panel')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="fas fa-users me-2"></i>
                    User Management
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag me-1"></i>ID</th>
                                <th><i class="fas fa-user me-1"></i>Name</th>
                                <th><i class="fas fa-envelope me-1"></i>Email</th>
                                <th><i class="fas fa-crown me-1"></i>Admin Status</th>
                                <th><i class="fas fa-calendar me-1"></i>Created</th>
                                <th><i class="fas fa-cogs me-1"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>
                                    <span class="badge bg-primary">#{{ $user->id }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar me-3" style="width: 35px; height: 35px; font-size: 0.875rem;">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-muted">{{ $user->email }}</span>
                                </td>
                                <td>
                                    @if($user->is_admin)
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-crown me-1"></i>
                                            Admin
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="fas fa-user me-1"></i>
                                            User
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ $user->created_at->format('M d, Y') }}
                                    </small>
                                </td>
                                <td>
                                    @if($user->is_admin)
                                        <button class="btn btn-sm btn-outline-warning" disabled>
                                            <i class="fas fa-crown me-1"></i>
                                            Admin
                                        </button>
                                    @else
                                        <form method="POST" action="#" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fas fa-user-shield me-1"></i>
                                                Make Admin
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">No users found</h5>
                                    <p class="text-muted mb-0">There are no users in the system yet.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($users->count() > 0)
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Total Users: <strong>{{ $users->count() }}</strong>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-warning">
                                    <i class="fas fa-crown me-2"></i>
                                    Admin Users: <strong>{{ $users->where('is_admin', 1)->count() }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <div class="display-6 text-primary mb-2">
                    <i class="fas fa-users"></i>
                </div>
                <h5>Total Users</h5>
                <h3 class="text-primary">{{ $users->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <div class="display-6 text-warning mb-2">
                    <i class="fas fa-crown"></i>
                </div>
                <h5>Administrators</h5>
                <h3 class="text-warning">{{ $users->where('is_admin', 1)->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <div class="display-6 text-info mb-2">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h5>Regular Users</h5>
                <h3 class="text-info">{{ $users->where('is_admin', 0)->count() }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
