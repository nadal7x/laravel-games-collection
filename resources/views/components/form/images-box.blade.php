@props(['element', 'lang', 'name', 'quantity'])

<div class="images-gallery-box {{ $quantity }}"
    data-config="{{ json_encode([
        'thumbnail' => [
            'widthPx' => '100',
            'heightPx' => '100',
        ],
        'xs' => [
            'widthPx' => '200',
            'heightPx' => '200',
        ],
        'sm' => [
            'widthPx' => '200',
            'heightPx' => '200',
        ],
        'md' => [
            'widthPx' => '450',
            'heightPx' => '450',
        ],
        'lg' => [
            'widthPx' => '450',
            'heightPx' => '450',
        ],
    ]) }}"
    data-quantity="{{ $quantity }}" data-name="{{ $name }}" data-lang="{{ $lang }}">
    <label for="images">{{ __('admin/titles.' . $name) }}</label>
    @if (isset($element->adminImages[$lang][$name]['files']))
        @foreach ($element->adminImages[$lang][$name]['files'] as $image)
            <div class="open-gallery active">
                <div class="image-actions-gallery">
                    <div class="image-remove">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="open-gallery-overlay">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <title>file-image-plus-outline</title>
                        <path
                            d="M7 19L12 14L13.88 15.88C13.33 16.79 13 17.86 13 19H7M10 10.5C10 9.67 9.33 9 8.5 9S7 9.67 7 10.5 7.67 12 8.5 12 10 11.33 10 10.5M13.09 20H6V4H13V9H18V13.09C18.33 13.04 18.66 13 19 13C19.34 13 19.67 13.04 20 13.09V8L14 2H6C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.46 21.39 13.21 20.72 13.09 20M18 15V18H15V20H18V23H20V20H23V18H20V15H18Z" />
                    </svg>
                </div>
                @if (isset($image['filename']) && $image['filename'] != '')
                    <img src="{{ $image['filename'] ? route('images_thumb', $image['filename']) : '' }}"
                        alt="{{ $image['alt'] ?? '' }}" title="{{ $image['title'] ?? '' }}">
                @else
                    <img src="" alt="" title="">
                @endif
            </div>
        @endforeach
    @else
        <div class="open-gallery">
            <div class="image-actions-gallery">
                <div class="image-remove">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="open-gallery-overlay">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>file-image-plus-outline</title>
                    <path
                        d="M7 19L12 14L13.88 15.88C13.33 16.79 13 17.86 13 19H7M10 10.5C10 9.67 9.33 9 8.5 9S7 9.67 7 10.5 7.67 12 8.5 12 10 11.33 10 10.5M13.09 20H6V4H13V9H18V13.09C18.33 13.04 18.66 13 19 13C19.34 13 19.67 13.04 20 13.09V8L14 2H6C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.46 21.39 13.21 20.72 13.09 20M18 15V18H15V20H18V23H20V20H23V18H20V15H18Z" />
                </svg>
            </div>
            <img src="" alt="" title="">
        </div>
    @endif
</div>
