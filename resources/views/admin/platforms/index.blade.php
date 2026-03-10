<x-crud title="{{ __('admin/titles.platforms') }}" seotitle="{{ __('admin/titles.platforms') }}">

    <x-slot name="filter">
        <x-filter.modal-filter element="platform" />
    </x-slot>

    <x-slot name="table">
        <x-table.platform :records="$records" />
    </x-slot>

    <x-slot name="form">
        <x-form.platform :element="$element" />
    </x-slot>
</x-crud>
