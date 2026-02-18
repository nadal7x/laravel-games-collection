<x-crud title="{{ __('admin/titles.tags') }}" seotitle="{{ __('admin/titles.tags') }}">
    <x-slot name="table">
        <x-admin-table :records="$records" />
    </x-slot>

    <x-slot name="form">
        <x-form.tag :element="$element" />
    </x-slot>
</x-crud>
