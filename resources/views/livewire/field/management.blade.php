{{--
    Asset Tag, Model, Country, Serial Number, Mac Address, Actions
--}}
<x-table.layout
    itemCount="{{ $fields->count() }}"
    noItemsMessage="No Fields Available"
    createModal="true"
>
    <x-slot name="header">
        {{ __('Manage Fields') }}
    </x-slot>

    <x-slot name="searchBar">
        <x-filters.country-dropdown wire:model="country"/>
        <x-forms.search-input
            wire:model.debounce.500ms="search"
            placeholder="Search field name"/>
    </x-slot>

    <x-slot name="columns">
        <th class="px-4 py-3">
            <div class="flex cursor-pointer" wire:click="sortBy('location)">
                Field Name
                <x-sort-icon
                    field="location"
                    :sortField="$sortField"
                    :sortAsc="$sortAsc"
                />
            </div>
        </th>

        <th class="px-4 py-3">Block</th>
        <th class="px-4 py-3">Country</th>
        <th class="px-4 py-3">Area (acres)</th>
        <th class="px-4 py-3">Description</th>
        <th class="px-4 py-3 w-40">Actions</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($fields as $field)
        <tr id="{{ $field->location }}" class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $field->name }}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $field->block->location ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $field->block->country->name ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $field->area ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ \Illuminate\Support\Str::limit($field->description, 20, $end='...') ?? ''}}
            </td>

            <td class="px-4 py-3 text-sm  space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $field->id }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $fields->links() }}
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
                    Livewire.emit('deleteField', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
