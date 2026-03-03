<x-layouts.login title="Verify Email" seotitle="Verify Email">
    <div class="login-container">
        <div class="login-box">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="login-box">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <form method="POST" action="{{ route('customer-verification.send') }}">
            @csrf
            <button class="submit-button main-button" type="submit">{{ __('Resend Verification Email') }}</button>
        </form>

        <form method="POST" action="{{ route('customer-logout') }}">
            @csrf
            <button class="submit-button main-button" type="submit">{{ __('Log Out') }}</button>
        </form>
    </div>
</x-layouts.login>
