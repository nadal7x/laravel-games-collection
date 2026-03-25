@props(['element'])
<x-layouts.form :element="$element" storeRoute="faqs_store" createRoute="faqs_create" destroyRoute="faqs_destroy">
    <form>
        <div class="general-content tab-content active" data-tab-content="general" data-tab-group="main">
            <input type="hidden" name="id" value="{{ $element ? $element->id : '' }}">
            <div class="form-field">
                <label>{{ __('admin/titles.name') }}</label>
                <input type="text" name="name" value="{{ $element ? $element->name : '' }}">
            </div>
            <x-form.lang :element="$element" :langs="['es', 'ca', 'en']" :fields="['text' => 'question', 'textarea' => 'answer']" />
        </div>
        <div class="images-content tab-content" data-tab-content="images" data-tab-group="main">
            <x-form.images :element="$element" />
        </div>
    </form>
</x-layouts.form>
