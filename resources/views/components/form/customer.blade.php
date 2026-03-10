@props(['element'])
<x-layouts.form :element="$element" storeRoute="customers_store" createRoute="customers_create"
    destroyRoute="customers_destroy">
    <form>
        <div class="general-content tab-content active" data-tab-content="general" data-tab-group="main">
            <input type="hidden" name="id" value="{{ $element ? $element->id : '' }}">
            <div class="form-field">
                <label>{{ __('admin/titles.name') }}</label>
                <input type="text" name="name" value="{{ $element ? $element->name : '' }}">
            </div>
            <div class="form-field">
                <label>{{ __('admin/titles.email') }}</label>
                <input type="mail" name="email" value="{{ $element ? $element->email : '' }}">
            </div>
            @if (!$element)
                <div class="form-field">
                    <label>{{ __('admin/titles.password') }}</label>
                    <input type="password" name="password" value="">
                </div>
                <div class="form-field">
                    <label>{{ __('admin/titles.password_confirmation') }}</label>
                    <input type="password" name="password_confirmation" value="">
                </div>
            @endif
        </div>
        <div class="images-content tab-content" data-tab-content="images" data-tab-group="main">
            <x-form.images :element="$element" />
        </div>
    </form>
</x-layouts.form>
