<x-table.layout
    itemCount="{{ $storages->count() }}"
    noItemsMessage="No Storages Available"
    createModal="true"
>
    <x-slot name="header">
        {{ __('Manage Storages') }}
    </x-slot>

    <x-slot name="columns">
        <th class="px-4 py-3">Number</th>
        <th class="px-4 py-3">Type</th>
        <th class="px-4 py-3">Actions</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($storages as $storage)
        <tr id="{{ $storage->id }}" class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $storage->number }}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $storage->type }}
            </td>

            <td class="px-4 py-3 text-sm space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $storage->id }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $storages->links() }}
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
                    Livewire.emit('deleteStorage', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
