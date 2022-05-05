@section('title', 'Variety Fields')
<x-table.layout
    itemCount="{{ $varietyFields->count() }}"
    noItemsMessage="No Variety Fields Available"
    createModal="true"
    tableWidth="max-w-6xl"
>
    <x-slot name="header">
        {{ __('Manage Variety Fields') }}
    </x-slot>

    <x-slot name="searchBar">
        <x-filters.variety-dropdown wire:model="variety"/>
        <x-forms.search-input
            wire:model.debounce.500ms="search"
            placeholder="Search Variety Name"/>
    </x-slot>

    <x-slot name="columns">
        <th class="px-4 py-3 text-center">Variety</th>
        <th class="px-4 py-3 text-center">Field</th>
        <th class="px-4 py-3 text-center">Plant Date</th>
        <th class="px-4 py-3 text-center">Description</th>


        <th class="px-4 py-3 text-center w-40">Actions</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($varietyFields as $varietyField)
        <tr id="{{ $varietyField->variety->name ?? '' }}" class="text-gray-700 dark:text-gray-400">

            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $varietyField->variety->name ?? '' }}
            </td>
            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $varietyField->field->name  ?? '' }}
            </td>
            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $varietyField->start_date ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm text-center dark:text-gray-200">
                {{ $varietyField->description ?? ''}}
            </td>
            <td class="px-4 py-3 text-sm text-center space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $varietyField->id }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $varietyFields->links() }}
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
                    Livewire.emit('deleteVarietyField', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
