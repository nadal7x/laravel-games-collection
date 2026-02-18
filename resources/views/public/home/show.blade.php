<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Games Collection') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <h1>{{ __('admin/titles.home') }}</h1>
        <div class="menu">
            <div class="menu-button">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="menu-content">
                <nav class="nav">
                    <a href="{{ route('users') }}">{{ __('admin/titles.users') }}</a>
                    <a href="{{ route('customers') }}">{{ __('admin/titles.customers') }}</a>
                    <a href="{{ route('resources') }}">{{ __('admin/titles.resources') }}</a>
                    <a href="{{ route('tags') }}">{{ __('admin/titles.tags') }}</a>
                    <a href="{{ route('platforms') }}">{{ __('admin/titles.platforms') }}</a>
                </nav>
            </div>
        </div>
    </header>
    <main class="public-main">
        <div class="resource-box">
            <div class="resource-img">
                <img width="100%" src="capsule_616x353.jpg">
            </div>
            <div class="resource-details">
                <h2>{{ $element->title }}</h2>
                <p><span>{{ __('admin/titles.description') }}:</span> {{ $element->description }}</p>
                <p><span>{{ __('admin/titles.url') }}:</span> {{ $element->url }}</p>
                <p><span>{{ __('admin/titles.release_date') }}:</span> {{ $element->release_date }}</p>
                <p><span>{{ __('admin/titles.developer') }}:</span> {{ $element->developer }}</p>
                <p><span>{{ __('admin/titles.publisher') }}:</span> {{ $element->publisher }}</p>
                <p><span>{{ __('admin/titles.rating') }}:</span> {{ $element->rating }}</p>
            </div>
        </div>
        <div class="resource-text">
            <h2>Maecenas ornare lacus</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et velit metus. Suspendisse et gravida ex.
                Nullam mattis ultricies ante, at aliquet ligula bibendum sed. In purus nisl, venenatis id aliquet a,
                tincidunt ultricies ipsum. Proin non ipsum a arcu sollicitudin scelerisque tempus in odio. Duis mollis
                lectus sit amet cursus sollicitudin. Nullam posuere, sem quis convallis efficitur, dolor justo congue
                magna,
                in egestas quam lorem vitae sapien. Curabitur vel mauris at diam tempus vulputate id vitae purus. Nam
                euismod, libero et fringilla pulvinar, lorem erat auctor arcu, ac ultricies massa velit sed eros.</p>
        </div>
    </main>
    <footer>
        <p>© {{ date('Y') }} {{ config('app.name') }}</p>
    </footer>
</body>

</html>
