<x-crud title="{{ __('admin/titles.users') }}" seotitle="{{ __('admin/titles.users') }}">

    <x-slot name="table">
        <x-table.user :records="$records" />
    </x-slot>

    <x-slot name="form">
        <x-form.user :element="$element" />
    </x-slot>
</x-crud>
