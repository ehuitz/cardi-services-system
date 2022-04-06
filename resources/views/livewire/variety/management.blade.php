<x-table.layout
    itemCount="{{ $varieties->count() }}"
    noItemsMessage="No Varieties Available"
    createModal="true"
>
    <x-slot name="header">
        {{ __('Manage Varieties') }}
    </x-slot>

    <x-slot name="searchBar">
        <x-filters.origin-dropdown wire:model="origin"/>
        <x-forms.search-input
            wire:model.debounce.500ms="search"
            placeholder="Search variety origin"/>
    </x-slot>

    <x-slot name="columns">
        <th class="px-4 py-3">
            <div class="flex cursor-pointer" wire:click="sortBy('name)">
                Variety Name
                <x-sort-icon
                    field="name"
                    :sortField="$sortField"
                    :sortAsc="$sortAsc"
                />
            </div>
        </th>

        <th class="px-4 py-3">Origin</th>
        <th class="px-4 py-3">Country</th>
        <th class="px-4 py-3">Type</th>
        <th class="px-4 py-3">Description</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($varieties as $variety)
        <tr id="{{ $variety->name }}" class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $variety->name }}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $variety->origin->institution. ' - '. $variety->origin->intro_name ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $variety->origin->country->name ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $variety->type ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ \Illuminate\Support\Str::limit($variety->description, 20, $end='...') ?? ''}}
            </td>

            <td class="px-4 py-3 text-sm  space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $variety->id }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $varieties->links() }}
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
                    Livewire.emit('deleteVariety', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
