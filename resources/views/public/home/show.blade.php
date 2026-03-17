<x-layouts.public title="{{ $resource->locale[app()->getLocale()]['title'] }}"
    seotitle="{{ $resource->locale[app()->getLocale()]['title'] }}">
    <div class="resource-box">
        <div class="resource-img">
            <img width="100%"
                src="https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/686060/aa8075d11165fef4d4d0d09c156f0da0623b5da1/header.jpg?t=1771573546">
        </div>
        <div class="resource-details">
            <h2>{{ $resource->locale[app()->getLocale()]['title'] }}</h2>
            <p><span>{{ __('admin/titles.url') }}:</span> <a href="{{ $resource->url }}">{{ $resource->url }}</a></p>
            <p><span>{{ __('admin/titles.release_date') }}:</span> {{ $resource->release_date }}</p>
            <p><span>{{ __('admin/titles.developer') }}:</span> {{ $resource->developer }}</p>
            <p><span>{{ __('admin/titles.publisher') }}:</span> {{ $resource->publisher }}</p>
            <p><span>{{ __('admin/titles.rating') }}:</span> {{ $resource->rating }}</p>
            <p><span>{{ __('admin/titles.tags') }}:</span>
                @foreach ($resource->tags as $tag)
                    <span>{{ $tag }}</span>
                @endforeach
            </p>
        </div>
    </div>
    <div class="resource-text">
        <p>{{ $resource->locale[app()->getLocale()]['description'] }}</p>
    </div>
</x-layouts.public>
