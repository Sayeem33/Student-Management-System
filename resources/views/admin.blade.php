@extends('layout')

@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Admin Panel - User Management</h3>

    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <table class="table mt-5 table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th><i class="fas fa-hashtag me-1"></i>#</th>
                        <th><i class="fas fa-user me-1"></i>Name</th>
                        <th><i class="fas fa-envelope me-1"></i>Email</th>
                        <th><i class="fas fa-crown me-1"></i>Role</th>
                        <th><i class="fas fa-calendar me-1"></i>Joined</th>
                        <th><i class="fas fa-cogs me-1"></i>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    @forelse($users as $key => $user)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <i class="fas fa-user-circle me-2 text-primary"></i>
                            <strong>{{ $user->name }}</strong>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->is_admin)
                                <span class="badge bg-warning text-dark">
                                    <i class="fas fa-crown me-1"></i>Admin
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    <i class="fas fa-user me-1"></i>User
                                </span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                        <td>
                            @if($user->is_admin)
                                <button class="btn btn-sm btn-outline-warning" disabled>
                                    <i class="fas fa-crown me-1"></i>Admin
                                </button>
                            @else
                                <form method="POST" action="{{ route('admin.make-admin', $user->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success" 
                                            onclick="return confirm('Are you sure you want to make this user an admin?')">
                                        <i class="fas fa-user-shield me-1"></i>Make Admin
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-users fa-3x text-muted mb-3 d-block"></i>
                            <h5 class="text-muted">No users found</h5>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Statistics Cards -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-center" style="background-color: #e3f2fd;">
                        <div class="card-body">
                            <i class="fas fa-users fa-2x text-primary mb-2"></i>
                            <h5>Total Users</h5>
                            <h3 class="text-primary">{{ $users->count() }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center" style="background-color: #fff3cd;">
                        <div class="card-body">
                            <i class="fas fa-crown fa-2x text-warning mb-2"></i>
                            <h5>Administrators</h5>
                            <h3 class="text-warning">{{ $users->where('is_admin', 1)->count() }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center" style="background-color: #d1ecf1;">
                        <div class="card-body">
                            <i class="fas fa-user-graduate fa-2x text-info mb-2"></i>
                            <h5>Regular Users</h5>
                            <h3 class="text-info">{{ $users->where('is_admin', 0)->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
.table-hover tbody tr:hover {
    background-color: #f5f5f5;
}
.card {
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}
.card:hover {
    transform: translateY(-2px);
}
</style>
@endpush
