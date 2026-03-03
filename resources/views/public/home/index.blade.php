<?php

$appIds = [570, 730, 440, 374320, 113200, 10, 413150, 2357570]; // Juegos que quieres mostrar

function getGameData($appId)
{
    $url = "https://store.steampowered.com/api/appdetails?appids=$appId&l=spanish";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    return $data[$appId]['data'] ?? null;
}

?>

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
    <div class="gallery">
        @foreach ($appIds as $appId)
            @php
                $game = getGameData($appId);
            @endphp
            <div class="card">
                <a href="{{ route('resources.show', $appId) }}">
                    <div class="card-image">
                        <img
                            src="https://cdn.cloudflare.steamstatic.com/steam/apps/{{ $appId }}/library_600x900.jpg">
                    </div>
                    <div class="card-text">
                        <h3 class="card-title">{{ $game['name'] }}</h3>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-layouts.public>
