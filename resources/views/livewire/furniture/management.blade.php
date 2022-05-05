@section('title', 'Office Furniture')

<x-table.layout
    itemCount="{{ $devices->count() }}"
    noItemsMessage="No Furniture Available"
    createModal="true"
    tableWidth="max-w-6xl"
>
    <x-slot name="header">
        {{ __('Manage Furniture') }}
    </x-slot>

    <x-slot name="searchBar">
        <x-filters.department-dropdown wire:model="department"/>
        <x-forms.search-input
            wire:model.debounce.500ms="search"
            placeholder="Search tag, serial, mac..."/>
    </x-slot>

    <x-slot name="columns">
        <th class="px-4 py-3 text-center">

            <div class="flex items-center justify-center cursor-pointer" wire:click="sortBy('asset_tag')">
                Asset Tag
                <x-sort-icon
                    field="asset_tag"
                    :sortField="$sortField"
                    :sortAsc="$sortAsc"
                />
            </div>
        </th>
        <th class="px-4 py-3 text-center">Date Acquired</th>
        <th class="px-4 py-3 text-center">Model</th>
        <th class="px-4 py-3 text-center">Department</th>


        <th class="px-4 py-3 text-center w-40">Actions</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($devices as $device)
        <tr id="{{ $device->asset_tag }}" class="text-gray-700 dark:text-gray-400">

            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $device->asset_tag }}
            </td>
            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $device->acquired_at ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $device->model_no ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $device->department->name ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm text-center space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $device->asset_tag }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $devices->links() }}
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
                    Livewire.emit('deleteFurniture', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
