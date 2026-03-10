@props(['element'])
<x-layouts.form :element="$element" storeRoute="tags_store" createRoute="tags_create" destroyRoute="tags_destroy">
    <form>
        <div class="general-content tab-content active" data-tab-content="general" data-tab-group="main">
            <input type="hidden" name="id" value="{{ $element ? $element->id : '' }}">
            <div class="form-field">
                <label>{{ __('admin/titles.name') }}</label>
                <input type="text" name="name" value="{{ $element ? $element->name : '' }}">
            </div>
        </div>
        <div class="images-content tab-content" data-tab-content="images" data-tab-group="main">
            <x-form.images :element="$element" />
        </div>
    </form>
</x-layouts.form>
