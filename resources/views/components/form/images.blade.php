@props(['element'])
<div class="form-images">
    <div class="upload-images">
        <label for="images-upload" class="upload-label">Selecciona imágenes</label>
        <input type="file" id="images-upload" name="images[]" multiple accept="image/*" style="display:none;">
    </div>

    <div class="images-preview">
        @if (isset($element) && $element->images)
            @foreach ($element->images as $image)
                <div class="image-preview">
                    <img src="{{ asset('storage/' . $image->path) }}" alt="Imagen">
                    <button type="button" class="remove-image" data-id="{{ $image->id }}">×</button>
                </div>
            @endforeach
        @endif
    </div>
</div>
