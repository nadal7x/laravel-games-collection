<div class="lang-select-container">
    <select name="lang" id="lang" class="main-button">
        @foreach ($langs as $lang)
            <option value="{{ $lang->code }}" {{ $lang->code == app()->getLocale() ? 'selected' : '' }}>
                {{ $lang->code }}
            </option>
        @endforeach
    </select>
</div>
