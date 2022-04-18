<x-table.layout
    itemCount="{{ $crops->count() }}"
    noItemsMessage="No Crops Available"
    createModal="true"
>
    <x-slot name="header">
        {{ __('Manage Crops') }}
    </x-slot>

    <x-slot name="searchBar">
        <x-forms.search-input
            wire:model.debounce.500ms="search"
            placeholder="Search Crop"/>
    </x-slot>

    <x-slot name="columns">
        <th class="px-4 py-3">Common Name</th>
        <th class="px-4 py-3">Scientific Name</th>
        <th class="px-4 py-3">Possible Use</th>
        <th class="px-4 py-3">Seed Type</th>
        <th class="px-4 py-3">Actions</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($crops as $crop)
        <tr id="{{ $crop->id }}" class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $crop->name ?? '' }}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $crop->scientific_name ?? ''}}
            </td>

            <td>
                <span class="px-4 py-3 text-sm dark:text-gray-200">{{ \Illuminate\Support\Str::limit($crop->use, 20, $end='...') ?? ''}}</span>
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $crop->type }}
            </td>
            <td class="px-4 py-3 text-sm space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $crop->id }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $crops->links() }}
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
                    Livewire.emit('deleteCrop', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
