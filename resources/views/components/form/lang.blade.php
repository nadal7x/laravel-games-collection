@props(['element', 'langs', 'fields'])
<div class="form-lang" data-tab-group="lang">
    <div class="lang-buttons tab-buttons">
        @foreach ($langs as $lang)
            <div class="{{ $lang->code }}-tab tab-button tab-lang-button {{ $loop->first ? 'active' : '' }}"
                data-tab="{{ $lang->code }}" data-tab-group="lang">
                {{ $lang->code }}
            </div>
        @endforeach
    </div>
    @foreach ($langs as $lang)
        <div class="{{ $lang->code }}-lang-content tab-content tab-lang-content {{ $loop->first ? 'active' : '' }}"
            data-tab-content="{{ $lang->code }}" data-tab-group="lang">
            @foreach ($fields as $type => $field)
                <div class="form-field">
                    <label>{{ __('admin/titles.' . $field) }}</label>
                    @if ($type === 'textarea')
                        <textarea name="locale[{{ $lang->code }}][{{ $field }}]">
                            {{ $element->locale[$lang->code][$field] ?? '' }}
                        </textarea>
                    @else
                        <input type="{{ $type }}" name="locale[{{ $lang->code }}][{{ $field }}]"
                            value="{{ $element->locale[$lang->code][$field] ?? '' }}">
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach
</div>
