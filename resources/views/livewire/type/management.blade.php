<x-table.layout
    itemCount="{{ $types->count() }}"
    noItemsMessage="No Company Types Available"
    createModal="true"
>
    <x-slot name="header">
        {{ __('Manage Company Types') }}
    </x-slot>

    <x-slot name="columns">
        <th class="px-4 py-3">Name</th>
        <th class="px-4 py-3">Code</th>
        <th class="px-4 py-3">Actions</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($types as $type)
        <tr id="{{ $type->id }}" class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $type->name }}
            </td>
            <td class="px-4 py-3 text-sm dark:text-gray-200">
                {{ $type->code }}
            </td>
            <td class="px-4 py-3 text-sm space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $type->id }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $types->links() }}
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
                    Livewire.emit('deleteType', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
