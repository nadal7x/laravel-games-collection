<x-layouts.login title="Confirm Password" seotitle="Confirm Password">
    <div class="login-container">
        <div class="login-box">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('customer-password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="form-field full-width">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <button class="submit-button main-button" type="submit">
                {{ __('Confirm') }}
            </button>
        </form>
    </div>
</x-layouts.login>
