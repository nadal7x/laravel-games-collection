<x-layouts.public title="home" seotitle="home">
    <div class="main-text">
        <h2>Maecenas ornare lacus</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et velit metus. Suspendisse et gravida ex.
            Nullam mattis ultricies ante, at aliquet ligula bibendum sed. In purus nisl, venenatis id aliquet a,
            tincidunt ultricies ipsum. Proin non ipsum a arcu sollicitudin scelerisque tempus in odio. Duis mollis
            lectus sit amet cursus sollicitudin. Nullam posuere, sem quis convallis efficitur, dolor justo congue
            magna,
            in egestas quam lorem vitae sapien. Curabitur vel mauris at diam tempus vulputate id vitae purus. Nam
            euismod, libero et fringilla pulvinar, lorem erat auctor arcu, ac ultricies massa velit sed eros.</p>
    </div>
    <h2>{{ __('admin/titles.resources') }}</h2>
    <div class="cards-gallery">
        @foreach ($records as $record)
            @if (!$record['card-image'])
                @php
                    $record['card-image'] =
                        'https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/686060/ea77c084fe08e1654380778ef73f613185e7a6ca/library_600x900.jpg?t=1771573546';
                @endphp
            @endif
            <div class="card">
                <a
                    href="{{ route(app()->getLocale() . '.resource', ['title' => \Str::slug($record->locale[app()->getLocale()]['title'])]) }}">
                    <div class="card-image">
                        <img src="{{ $record['card-image'] }}" alt="{{ $record['name'] }}">
                    </div>
                    <div class="card-text">
                        <h3 class="card-title">{{ $record['name'] }}</h3>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-layouts.public>

<x-chat />
