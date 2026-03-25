<div class="table-buttons">
    <x-filter-table element="faq" />
    <x-pagination-buttons :records="$records" />
</div>
<div class="table-content">
    @foreach ($records as $record)
        <div class="table-element" data-endpoint="{{ route('faqs_edit', $record->id) }}">
            <ul>
                <li><span class="table-element-title">{{ __('admin/titles.question') }}:</span>
                    {{ $record->locale[app()->getLocale()]['question'] }}
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
