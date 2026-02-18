@props(['title', 'seotitle'])

<x-layouts.admin :title="$title" :seotitle="$seotitle">

    <div class="login-container">
        <h2>Login</h2>
        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-field full-width">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-field full-width">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>

            <button class="submit-button main-button" type="submit">Login</button>
        </form>
    </div>
</x-layouts.admin>
