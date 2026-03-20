<div class="modal-content">
    <div class="modal-header">
        <h2>Imágenes</h2>
        <button class="modal-close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>window-close</title>
                <path
                    d="M13.46,12L19,17.54V19H17.54L12,13.46L6.46,19H5V17.54L10.54,12L5,6.46V5H6.46L12,10.54L17.54,5H19V6.46L13.46,12Z" />
            </svg></button>
    </div>
    <div class="modal-body form-content modal-images-container">
        <div class="modal-images-content">
            <div class="upload-image">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>file-image-plus-outline</title>
                    <path
                        d="M7 19L12 14L13.88 15.88C13.33 16.79 13 17.86 13 19H7M10 10.5C10 9.67 9.33 9 8.5 9S7 9.67 7 10.5 7.67 12 8.5 12 10 11.33 10 10.5M13.09 20H6V4H13V9H18V13.09C18.33 13.04 18.66 13 19 13C19.34 13 19.67 13.04 20 13.09V8L14 2H6C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.46 21.39 13.21 20.72 13.09 20M18 15V18H15V20H18V23H20V20H23V18H20V15H18Z" />
                </svg>
                <input class="upload-image-input" type="file" name="images" id="images"
                    data-endpoint="{{ route('images_store') }}">
            </div>

            @foreach ($images as $image)
                <div class="image-item" data-image="{{ $image->filename }}">
                    <img src="{{ route('images_thumb', $image->filename) }}" alt="{{ $image->filename }}">
                    <div class="image-actions">
                        <button class="image-delete" data-endpoint="{{ route('images_destroy', $image->filename) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="image-data">
            <div class="form-field full-width">
                <label>{{ __('admin/titles.title') }}</label>
                <input type="text" name="title">
            </div>
            <div class="form-field full-width">
                <label>Alt</label>
                <input type="text" name="alt">
            </div>

            <div class="save-image">
                <div class="main-button">Guardar</div>
            </div>
        </div>
    </div>
</div>
