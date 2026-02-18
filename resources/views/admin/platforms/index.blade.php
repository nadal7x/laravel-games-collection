<x-crud title="{{ __('admin/titles.platforms') }}" seotitle="{{ __('admin/titles.platforms') }}">
    <x-slot name="table">
        <x-admin-table :records="$records" />
    </x-slot>

    <x-slot name="form">
        <x-form.platform :element="$element" />
    </x-slot>
</x-crud>
