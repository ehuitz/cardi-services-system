@section('title', 'Blocks')

<x-table.layout
    itemCount="{{ $blocks->count() }}"
    noItemsMessage="No Blocks Available"
    createModal="true"
>
    <x-slot name="header">
        {{ __('Manage Blocks') }}
    </x-slot>

    <x-slot name="searchBar">
        <x-filters.country-dropdown wire:model="country"/>
        <x-forms.search-input
            wire:model.debounce.500ms="search"
            placeholder="Search location"/>
    </x-slot>

    <x-slot name="columns">
        <th class="px-4 py-3">
            <div class="flex cursor-pointer" wire:click="sortBy('location)">
                Location
                <x-sort-icon
                    field="location"
                    :sortField="$sortField"
                    :sortAsc="$sortAsc"
                />
            </div>
        </th>

        <th class="px-4 py-3">Country</th>
        <th class="px-4 py-3">Area (acres)</th>
        <th class="px-4 py-3">Description</th>

        <th class="px-4 py-3 w-40">Actions</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($blocks as $block)
        <tr id="{{ $block->location }}" class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $block->location }}
            </td>

            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $block->country->name ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $block->area ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ \Illuminate\Support\Str::limit($block->description, 20, $end='...') ?? ''}}
            </td>

            <td class="px-4 py-3 text-sm  space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $block->id }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $blocks->links() }}
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
                    Livewire.emit('deleteBlock', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
