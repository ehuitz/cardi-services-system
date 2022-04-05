
<x-table.layout
    itemCount="{{ $origins->count() }}"
    noItemsMessage="No Origins Available"
    createModal="true"
>
    <x-slot name="header">
        {{ __('Manage Origins') }}
    </x-slot>

    <x-slot name="searchBar">
        <x-filters.country-dropdown wire:model="country"/>
        <x-forms.search-input
            wire:model.debounce.500ms="search"
            placeholder="Search Institution"/>
    </x-slot>

    <x-slot name="columns">
        <th class="px-4 py-3">
            <div class="flex cursor-pointer" wire:click="sortBy('institution)">
                Institution
                <x-sort-icon
                    field="institution"
                    :sortField="$sortField"
                    :sortAsc="$sortAsc"
                />
            </div>
        </th>

        <th class="px-4 py-3">Country</th>
        <th class="px-4 py-3">Location</th>
        <th class="px-4 py-3">Introductory Name</th>
        <th class="px-4 py-3 w-40">Actions</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($origins as $origin)
        <tr id="{{ $origin->institution }}" class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $origin->institution }}
            </td>

            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $origin->country->name ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $origin->location ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $origin->intro_name ?? ''}}
            </td>


            <td class="px-4 py-3 text-sm  space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $origin->id }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $origins->links() }}
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
                    Livewire.emit('deleteOrigin', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
