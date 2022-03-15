{{--
    Asset Tag, Model, Country, Serial Number, Mac Address, Actions
--}}
<x-table.layout
    itemCount="{{ $departments->count() }}"
    noItemsMessage="No Departments Available"
    createModal="true"
>
    <x-slot name="header">
        {{ __('Manage Departments') }}
    </x-slot>

    <x-slot name="searchBar">
        <x-filters.country-dropdown wire:model="country"/>
        <x-forms.search-input
            wire:model.debounce.500ms="search"
            placeholder="Search name"/>
    </x-slot>

    <x-slot name="columns">
        <th class="px-4 py-3">
            <div class="flex items-center justify-center cursor-pointer" wire:click="sortBy('name)">
                Name
                <x-sort-icon
                    field="name"
                    :sortField="$sortField"
                    :sortAsc="$sortAsc"
                />
            </div>
        </th>

        <th class="px-4 py-3">Country</th>

        <th class="px-4 py-3 w-40">Actions</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($departments as $department)
        <tr id="{{ $department->name }}" class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $department->name }}
            </td>

            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $department->country->name ?? ''}}
            </td>

            <td class="px-4 py-3 text-sm  space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $department->id }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $departments->links() }}
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
                    Livewire.emit('deleteDepartment', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
