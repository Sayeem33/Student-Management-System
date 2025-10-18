<section>
    <h2 class="text-lg font-medium mb-3 text-danger">Delete Account</h2>

    <p class="text-sm text-gray-600 mb-3">
        Once your account is deleted, all of its resources and data will be permanently deleted.
    </p>

    <form action="{{ route('profile.destroy') }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="mb-3">
            <label for="password_delete" class="form-label">Enter Password to Confirm</label>
            <input type="password" name="password" id="password_delete" class="form-control" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-danger">Delete Account</button>
    </form>
</section>
