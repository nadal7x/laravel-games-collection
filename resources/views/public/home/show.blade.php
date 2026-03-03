<x-layouts.public title="{{ $element->title }}" seotitle="{{ $element->title }}">
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
</x-layouts.public>
