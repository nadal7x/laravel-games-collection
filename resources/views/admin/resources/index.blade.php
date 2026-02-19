<x-crud title="{{ __('admin/titles.resources') }}" seotitle="{{ __('admin/titles.resources') }}">
    <x-slot name="table">
        <x-table.resource :records="$records" />
    </x-slot>

    <x-slot name="form">
        <x-form.resource :element="$element" />
    </x-slot>
</x-crud>
