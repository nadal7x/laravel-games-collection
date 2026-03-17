@props(['element'])

<input type="text" class="tag-input" placeholder="Añadir tag..." list="tags-list">
<div class="tags-container">
    @if ($element->tags && count($element->tags) > 0)
        @foreach ($element->tags as $tagName)
            @php
                $tagData = $tags->firstWhere('name', $tagName);
            @endphp
            @if ($tagData)
                <span class="tag">
                    {{ $tagData->name }}
                    <button type="button" class="remove-tag" data-tag-id="{{ $tagData->id }}"
                        data-tag-name="{{ $tagData->name }}">×</button>
                </span>
            @endif
        @endforeach
    @endif
</div>

<div class="hidden-tags">
    @if ($element->tags && count($element->tags) > 0)
        @foreach ($element->tags as $tagName)
            @php
                $tagData = $tags->firstWhere('name', $tagName);
            @endphp
            @if ($tagData)
                <input type="hidden" name="tags[]" value="{{ $tagData->name }}">
            @endif
        @endforeach
    @endif
</div>
<div class="tag-suggestions"></div>

<datalist class="tags-list" id="tags-list">
    @foreach ($tags as $tag)
        <option value="{{ $tag->name }}" data-id="{{ $tag->id }}"></option>
    @endforeach
</datalist>
