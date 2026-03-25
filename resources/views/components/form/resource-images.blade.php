@props(['element'])
<div class="form-images" data-tab-group="lang-images">
    <div class="lang-buttons tab-buttons">
        @foreach ($langs as $lang)
            <div class="{{ $lang->code }}-tab tab-button tab-lang-button {{ $loop->first ? 'active' : '' }}"
                data-tab="{{ $lang->code }}" data-tab-group="lang-images">
                {{ $lang->code }}
            </div>
        @endforeach
    </div>
    @foreach ($langs as $lang)
        <div class="{{ $lang->code }}-images-content tab-content tab-images-lang-content {{ $loop->first ? 'active' : '' }}"
            data-tab-content="{{ $lang->code }}" data-tab-group="lang-images">
            <x-form.images-box :element="$element" :lang="$lang->code" name="header" quantity="single">
            </x-form.images-box>
            <x-form.images-box :element="$element" :lang="$lang->code" name="gallery" quantity="multiple">
            </x-form.images-box>
        </div>
    @endforeach
</div>
