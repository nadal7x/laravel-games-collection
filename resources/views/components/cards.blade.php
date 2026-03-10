<div class="cards-gallery">
    @foreach ($elements as $element)
        <div class="card">
            <a href="{{ route($route, $element->sitemap->slug) }}">
                <div class="card-image">
                    <img src="{{ $element->card_image }}">
                </div>
                <div class="card-text">
                    <span class="card-rank">{{ $element->rank }}</span>
                    <h3 class="card-title">{{ $element->name }}</h3>
                </div>
            </a>
        </div>
    @endforeach
</div>
