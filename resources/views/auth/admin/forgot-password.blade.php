<x-layouts.login title="Forgot Password" seotitle="Forgot Password">
    <div class="login-container">
        <div class="login-box">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-field full-width">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <button class="submit-button main-button" type="submit">{{ __('Email Password Reset Link') }}</button>
        </form>
    </div>
</x-layouts.login>
