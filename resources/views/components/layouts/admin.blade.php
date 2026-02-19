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
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <p>© {{ date('Y') }} {{ config('app.name') }}</p>
    </footer>
</body>

</html>
