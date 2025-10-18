@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Profile Management</h2>

    {{-- Update Profile Info --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Update Profile</div>
        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" name="name" type="text" class="form-control" 
                        value="{{ old('name', auth()->user()->name) }}" required>
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-control"
                        value="{{ old('email', auth()->user()->email) }}" required>
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Save Changes</button>
            </form>
        </div>
    </div>

    {{-- Change Password --}}
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark">Change Password</div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                    @error('current_password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-warning">Update Password</button>
            </form>
        </div>
    </div>

    {{-- Delete Account --}}
    <div class="card">
        <div class="card-header bg-danger text-white">Delete Account</div>
        <div class="card-body">
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete your account?')">
                    Delete Account
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
