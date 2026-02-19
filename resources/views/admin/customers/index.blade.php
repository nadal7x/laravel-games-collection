<x-crud title="{{ __('admin/titles.customers') }}" seotitle="{{ __('admin/titles.customers') }}">
    <x-slot name="table">
        <x-table.customer :records="$records" />
    </x-slot>

    <x-slot name="form">
        <x-form.customer :element="$element" />
    </x-slot>
</x-crud>
