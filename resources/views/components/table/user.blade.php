<x-filter.filter-buttons element="user" />
<div class="table-content">
    @foreach ($records as $record)
        <div class="table-element" data-endpoint="{{ route('users_edit', $record->id) }}">
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
