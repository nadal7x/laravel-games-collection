@props(['title', 'seotitle'])

<x-layouts.admin :title="$title" :seotitle="$seotitle">

    <div class="crud">
        <div class="table">
            {{ $table }}
        </div>

        <div class="form">
            {{ $form }}
        </div>
    </div>

</x-layouts.admin>
