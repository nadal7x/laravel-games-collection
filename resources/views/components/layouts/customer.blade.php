@props(['title', 'seotitle'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Games Collection') }} - {{ $seotitle }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <h1>{{ $title }}</h1>
        <div class="header-menus-container">
            <div class="account-menu-container">
                @if (Route::has('login'))
                    @auth
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>account</title>
                            <path
                                d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                        </svg>
                        <span class="header-login-user">{{ Auth::user()->name }}</span>
                        <div class="account-menu">
                            <a href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                            <a href="{{ route('logout') }}">{{ __('Logout') }}</a>
                        </div>
                    @else
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endauth
                @endif
            </div>
            <div class="menu">
                <div class="menu-button">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="menu-content">
                    <nav class="nav">
                        <a href="{{ route('customer-dashboard') }}">{{ __('titles.dashboard') }}</a>
                        <a href="{{ route('faqs') }}">{{ __('admin/titles.faqs') }}</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <p>© {{ date('Y') }} {{ config('app.name') }}</p>
    </footer>
</body>

</html>
