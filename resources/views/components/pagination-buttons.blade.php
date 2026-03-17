@props(['records'])

@if ($records->lastPage() > 1)
    <div class="pagination-buttons">
        <div class="pagination-first pagination-button main-button svg-container {{ $records->currentPage() == 1 ? 'disabled' : '' }}"
            data-pagination="{{ $records->url(1) }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>transfer-left</title>
                <path d="M21,16H19V8H21V16M17,16H15V8H17V16M13,16H11V8H13V16M9,5V19L2,12L9,5Z" />
            </svg>
        </div>
        <div class="pagination-previous pagination-button main-button svg-container {{ $records->currentPage() == 1 ? 'disabled' : '' }}"
            data-pagination="{{ $records->previousPageUrl() }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>arrow-left-bold</title>
                <path d="M20,9V15H12V19.84L4.16,12L12,4.16V9H20Z" />
            </svg>
        </div>
        <div class="pagination-current">
            <span class="pagination-current-page">{{ $records->currentPage() }}</span>
            <span>/</span>
            <span class="pagination-total">{{ $records->lastPage() }}</span>
        </div>
        <div class="pagination-next pagination-button main-button svg-container {{ $records->currentPage() == $records->lastPage() ? 'disabled' : '' }}"
            data-pagination="{{ $records->nextPageUrl() }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>arrow-right-bold</title>
                <path d="M4,15V9H12V4.16L19.84,12L12,19.84V15H4Z" />
            </svg>
        </div>
        <div class="pagination-last pagination-button main-button svg-container {{ $records->currentPage() == $records->lastPage() ? 'disabled' : '' }}"
            data-pagination="{{ $records->url($records->lastPage()) }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>transfer-right</title>
                <path d="M3,8H5V16H3V8M7,8H9V16H7V8M11,8H13V16H11V8M15,19.25V4.75L22.25,12L15,19.25Z" />
            </svg>
        </div>
    </div>
@endif
