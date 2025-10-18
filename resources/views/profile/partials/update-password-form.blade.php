<section>
    <h2 class="text-lg font-medium mb-3">Update Password</h2>

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" name="current_password" id="current_password" class="form-control" required>
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Password</button>

        @if(session('status') === 'password-updated')
            <span class="text-success ms-3">Password updated successfully.</span>
        @endif
    </form>
</section>
