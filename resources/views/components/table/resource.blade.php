<div class="table-buttons">
    <x-filter-table element="resource" />
    <x-pagination-buttons :records="$records" />
</div>

<div class="table-content">
    @foreach ($records as $record)
        <div class="table-element" data-endpoint="{{ route('resources_edit', $record->id) }}">
            <ul>
                <li><span class="table-element-title">{{ __('admin/titles.name') }}:</span>
                    {{ $record->name }}
                </li>
                <li><span class="table-element-title">{{ __('admin/titles.release_date') }}:</span>
                    {{ $record->release_date }}
                </li>
                <li><span class="table-element-title">{{ __('admin/titles.developer') }}:</span>
                    {{ $record->developer }}
                </li>
                <li><span class="table-element-title">{{ __('admin/titles.publisher') }}:</span>
                    {{ $record->publisher }}
                </li>
                <li><span class="table-element-title">{{ __('admin/titles.rating') }}:</span>
                    {{ $record->rating }}
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
