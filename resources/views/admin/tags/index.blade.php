<x-crud title="{{ __('admin/titles.tags') }}" seotitle="{{ __('admin/titles.tags') }}">

    <x-slot name="filter">
        <x-filter.modal-filter element="tag" />
    </x-slot>

    <x-slot name="table">
        <x-table.tag :records="$records" />
    </x-slot>

    <x-slot name="form">
        <x-form.tag :element="$element" />
    </x-slot>
</x-crud>
