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
                        <a class="fetch-link" href="{{ route('users') }}">{{ __('admin/titles.users') }}</a>
                        <a class="fetch-link" href="{{ route('customers') }}">{{ __('admin/titles.customers') }}</a>
                        <a class="fetch-link" href="{{ route('resources') }}">{{ __('admin/titles.resources') }}</a>
                        <a class="fetch-link" href="{{ route('tags') }}">{{ __('admin/titles.tags') }}</a>
                        <a class="fetch-link" href="{{ route('platforms') }}">{{ __('admin/titles.platforms') }}</a>
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
    <div class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Eliminar</h2>
                <button class="modal-close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <title>window-close</title>
                        <path
                            d="M13.46,12L19,17.54V19H17.54L12,13.46L6.46,19H5V17.54L10.54,12L5,6.46V5H6.46L12,10.54L17.54,5H19V6.46L13.46,12Z" />
                    </svg></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que quieres eliminar este elemento?</p>
            </div>
            <div class="modal-footer">
                <button class="modal-confirm">Eliminar</button>
                <button class="modal-cancel">Cancelar</button>
            </div>
        </div>
    </div>
</body>

</html>
