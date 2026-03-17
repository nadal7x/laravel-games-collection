@props(['element'])

<div class="platforms-select-container">
    @foreach ($platforms as $platform)
        <div class="checkbox-container">
            <input type="checkbox" name="platforms[]" id="platforms" value="{{ $platform->name }}"
                {{ in_array($platform->name, $element->platforms ?? []) ? 'checked' : '' }}>
            <label for="platforms">{{ $platform->name }}</label>
        </div>
    @endforeach
</div>
