<x-layouts.admin title="Dashboard" seotitle="Dashboard">
    <div>
        <h2>Hola {{ Auth::user()->name }}!</h2>
        <p>Has accedido al panel de administración.</p>
        <a href="{{ route('users') }}">{{ __('admin/titles.users') }}</a>
        <a href="{{ route('customers') }}">{{ __('admin/titles.customers') }}</a>
        <a href="{{ route('resources') }}">{{ __('admin/titles.resources') }}</a>
        <a href="{{ route('tags') }}">{{ __('admin/titles.tags') }}</a>
        <a href="{{ route('platforms') }}">{{ __('admin/titles.platforms') }}</a>
    </div>
</x-layouts.admin>
