<div class="table-buttons">
    <div class="filter-button tab-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <title>filter-menu</title>
            <path
                d="M11 11L16.76 3.62A1 1 0 0 0 16.59 2.22A1 1 0 0 0 16 2H2A1 1 0 0 0 1.38 2.22A1 1 0 0 0 1.21 3.62L7 11V16.87A1 1 0 0 0 7.29 17.7L9.29 19.7A1 1 0 0 0 10.7 19.7A1 1 0 0 0 11 18.87V11M13 16L18 21L23 16Z" />
        </svg></div>
    <div class="pagination-table tab-button">
        < 1/1>
    </div>
</div>
<div class="table-content">
    @foreach ($records as $record)
        <div class="table-element" data-endpoint="{{ route('customers_edit', $record->id) }}">
            <ul>
                <li><span class="table-element-title">{{ __('admin/titles.name') }}:</span>
                    {{ $record->name }}
                </li>
                <li><span class="table-element-title">{{ __('admin/titles.email') }}:</span>
                    {{ $record->email }}
                </li>
                <li><span class="table-element-title">{{ __('admin/titles.created_at') }}:</span>
                    {{ $record->created_at }}
                </li>
                <li><span class="table-element-title">{{ __('admin/titles.updated_at') }}:</span>
                    {{ $record->updated_at }}
                </li>
            </ul>
        </div>
    @endforeach
</div>
