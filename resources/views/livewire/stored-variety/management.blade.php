@section('title', 'Stored Varieties')
<x-table.layout
    itemCount="{{ $storedVarieties->count() }}"
    noItemsMessage="No Stored Varieties Available"
    createModal="true"
    tableWidth="max-w-7xl"
>
    <x-slot name="header">
        {{ __('Manage Stored Varieties') }}
    </x-slot>

    <x-slot name="searchBar">
        <x-filters.variety-dropdown wire:model="variety"/>
        {{-- <x-forms.search-input
            wire:model.debounce.500ms="search"
            placeholder="Search Variety Name"/> --}}
    </x-slot>

    <x-slot name="columns">
        <th class="px-4 py-3 text-center">Storage</th>
        <th class="px-4 py-3 text-center">Variety - Field - Date Planted</th>
        <th class="px-4 py-3 text-center">Variety</th>
        <th class="px-4 py-3 text-center">Quantity</th>
        <th class="px-4 py-3 text-center">Date</th>
        <th class="px-4 py-3 text-center">Batch No.</th>


        <th class="px-4 py-3 text-center w-40">Actions</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($storedVarieties as $storedVariety)
        <tr id="{{ $storedVariety->id ?? '' }}" class="text-gray-700 dark:text-gray-400">

            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $storedVariety->storage->number . ' - ' . $storedVariety->storage->department->name ?? '' }}
            </td>
            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $storedVariety->variety_field->variety->name. ' - '
                . $storedVariety->variety_field->field->name . ' - '
                . date('j \\ F Y', strtotime($storedVariety->variety_field->start_date))  ?? '' }}
            </td>
            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $storedVariety->variety->name ?? '' }}
            </td>
            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $storedVariety->quantity ?? '' }}
            </td>
            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ date('j \\ F Y', strtotime($storedVariety->date)) ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $storedVariety->description ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm text-center space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $storedVariety->id }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $storedVarieties->links() }}
    </x-slot>

    <x-slot name="scripts">
        <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to reverse this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteStoredVariety', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
