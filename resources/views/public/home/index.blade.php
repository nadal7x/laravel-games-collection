<?php
/*
$apiKey = 'D6C054C4A6EBBA28435F9C33B11E20B7';
$url = "https://api.steampowered.com/ISteamChartsService/GetMostPlayedGames/v1/?key=$apiKey";

$response = file_get_contents($url);
$data = json_decode($response, true);

$games = [];
$counter = 0;

if (isset($data['response']['ranks']) && is_array($data['response']['ranks'])) {
    foreach ($data['response']['ranks'] as $game) {
        $appid = $game['appid'];
        $rank = $game['rank'];

        $storeUrl = "https://store.steampowered.com/api/appdetails?appids=$appid";
        $storeData = json_decode(file_get_contents($storeUrl), true);

        if (isset($storeData[$appid]['success']) && $storeData[$appid]['success']) {
            $details = $storeData[$appid]['data'];
            $cardImage = "https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/$appid/library_600x900.jpg";
            $games[] = [
                'appid' => $appid,
                'rank' => $rank,
                'name' => $details['name'],
                'card-image' => $cardImage,
            ];
        }
        $counter++;

        if ($counter >= 20) {
            break;
        }
        usleep(500000);
    }
}
*/
$games = [];
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
    <div class="cards-gallery">
        @foreach ($games as $game)
            <div class="card">
                <a href="{{ route('resources.show', $game['appid']) }}">
                    <div class="card-image">
                        <img src="{{ $game['card-image'] }}">
                    </div>
                    <div class="card-text">
                        <span class="card-rank">{{ $game['rank'] }}</span>
                        <h3 class="card-title">{{ $game['name'] }}</h3>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-layouts.public>
