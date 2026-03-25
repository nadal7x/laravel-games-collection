<x-crud title="{{ __('admin/titles.faqs') }}" seotitle="{{ __('admin/titles.faqs') }}">

    <x-slot name="table">
        <x-table.faq :records="$records" />
    </x-slot>

    <x-slot name="form">
        <x-form.faq :element="$element" />
    </x-slot>
</x-crud>
