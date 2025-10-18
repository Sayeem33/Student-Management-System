<section>
    <h2 class="text-lg font-medium mb-3">Profile Information</h2>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name', $user->name) }}" required autofocus>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{ old('email', $user->email) }}" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Profile</button>

        @if(session('status') === 'profile-updated')
            <span class="text-success ms-3">Profile updated successfully.</span>
        @endif
    </form>
</section>
