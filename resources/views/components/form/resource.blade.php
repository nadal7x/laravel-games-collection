@props(['element'])
<x-layouts.form :element="$element" storeRoute="resources_store" createRoute="resources_create"
    destroyRoute="resources_destroy">
    <form>
        <input type="hidden" name="id" value="{{ $element ? $element->id : '' }}">
        <input type="hidden" name="api_id" value="{{ $element ? $element->api_id : '' }}">
        <div class="general-content tab-content active" data-tab-content="general" data-tab-group="main">
            <div class="form-field">
                <label>{{ __('admin/titles.name') }}</label>
                <input type="text" name="name" value="{{ $element ? $element->name : '' }}">
            </div>
            <div class="form-field">
                <label>{{ __('admin/titles.url') }}</label>
                <input type="text" name="url" value="{{ $element ? $element->url : '' }}">
            </div>
            <div class="form-field">
                <label>{{ __('admin/titles.release_date') }}</label>
                <input type="date" name="release_date" value="{{ $element ? $element->release_date : '' }}">
            </div>
            <div class="form-field">
                <label>{{ __('admin/titles.developer') }}</label>
                <input type="text" name="developer" value="{{ $element ? $element->developer : '' }}">
            </div>
            <div class="form-field">
                <label>{{ __('admin/titles.publisher') }}</label>
                <input type="text" name="publisher" value="{{ $element ? $element->publisher : '' }}">
            </div>
            <div class="form-field">
                <label>{{ __('admin/titles.rating') }}</label>
                <input type="number" name="rating" value="{{ $element ? $element->rating : '' }}">
            </div>
            <div class="form-field">
                <label>{{ __('admin/titles.tags') }}</label>
                <x-tags-select :element="$element" />
            </div>
            <div class="form-field">
                <label>{{ __('admin/titles.platforms') }}</label>
                <x-platforms-select :element="$element" />
            </div>
            <x-form.lang :element="$element" :langs="['es', 'en']" :fields="['text' => 'title', 'textarea' => 'description']" />
        </div>
        <div class="images-content tab-content" data-tab-content="images" data-tab-group="main">
            <x-form.resource-images :element="$element" />
        </div>

    </form>
</x-layouts.form>
