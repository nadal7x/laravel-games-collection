<x-layouts.customer title="Dashboard" seotitle="Dashboard">
    <div class="customer-dashboard">
        <div class="customer-info">
            <div class="customer-icon">

            </div>
            <div>
                <p> {{ __('Username') }}: {{ Auth::user()->name }}</p>
                <p> {{ __('Email') }}: {{ Auth::user()->email }}</p>
            </div>
            <div class="customer-info-item-content">
                <h3>Games Statistics</h3>
                <p>Total games: 34</p>
                <p>Pending games: 0</p>
                <p>In progress games: 0</p>
                <p>Completed games: 0</p>
                <p>Canceled games: 0</p>
            </div>
        </div>
        <div class="customer-games">
            <h2>{{ __('Your games') }}</h2>
            <div class="customer-games-stats">
                <a class="main-button game-pending" href=""><span>{{ __('Pending') }}</span></a>
                <a class="main-button game-in-progress" href=""><span>{{ __('In progress') }}</span></a>
                <a class="main-button game-completed" href=""><span>{{ __('Completed') }}</span></a>
                <a class="main-button game-canceled" href=""><span>{{ __('Canceled') }}</span></a>
            </div>
            <div class="customer-games-list">
                <div class="customer-game game-pending">
                    <img src="" alt="">
                    <h3>Game 1</h3>
                    <p>Status: Pending</p>
                </div>
                <div class="customer-game game-in-progress">
                    <img src="" alt="">
                    <h3>Game 2</h3>
                    <p>Status: In progress</p>
                </div>
                <div class="customer-game game-completed">
                    <img src="" alt="">
                    <h3>Game 3</h3>
                    <p>Status: Completed</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.customer>
