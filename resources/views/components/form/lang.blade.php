@props(['element', 'langs', 'fields'])
<div class="form-lang" data-tab-group="lang">
    <div class="lang-buttons tab-buttons">
        @foreach ($langs as $lang)
            <div class="{{ $lang }}-tab tab-button tab-lang-button {{ $loop->first ? 'active' : '' }}"
                data-tab="{{ $lang }}" data-tab-group="lang">
                {{ $lang }}
            </div>
        @endforeach
    </div>
    @foreach ($langs as $lang)
        <div class="{{ $lang }}-lang-content tab-content tab-lang-content {{ $loop->first ? 'active' : '' }}"
            data-tab-content="{{ $lang }}" data-tab-group="lang">
            @foreach ($fields as $field)
                <div class="form-field">
                    <label>{{ __('admin/titles.' . $field) }}</label>
                    <input type="text" name="{{ $field }}" value="{{ $element ? $element->$field : '' }}">
                </div>
            @endforeach
        </div>
    @endforeach
</div>
