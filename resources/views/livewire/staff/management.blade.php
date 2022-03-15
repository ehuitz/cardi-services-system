<x-table.layout
    itemCount="{{ $allStaff->count() }}"
    noItemsMessage="No Staff Available"
    createModal="true"
    tableWidth="max-w-6xl"
>
    <x-slot name="header">
        {{ __('Manage Staff') }}
    </x-slot>

    <x-slot name="columns">
        <th class="px-1 py-1">Name</th>
        {{-- <th class="px-1 py-1">Request Types</th> --}}
        <th class="px-1 py-1">Countries</th>
        <th class="px-1 py-1">Departments</th>
        <th class="px-1 py-1">Actions</th>
    </x-slot>

    <x-slot name="rows">
        @foreach($allStaff as $staff)
        <tr id="{{ $staff->id }}" class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 dark:text-gray-200 flex items-center text-sm">
                <div class="relative hidden w-8 h-8 mr-2 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full"
                        src="https://i.pravatar.cc/100?u={{ $staff->user->id }}"
                        alt=""
                        loading="lazy"
                    />
                    <div class="absolute inset-0 rounded-full shadow-inner"
                        aria-hidden="true"
                    ></div>
                </div>
                <div>
                    <p class="font-semibold dark:text-gray-200">
                        {{ $staff->user->name }}
                    </p>
                </div>
            </td>
            {{-- <td class="px-1 py-1 text-sm dark:text-gray-200">
                @foreach($staff->categories as $category)
                    {{ $category->name }}@if(!$loop->last),@endif
                @endforeach
            </td> --}}
            <td class="px-1 py-1 text-sm dark:text-gray-200">
                @foreach($staff->countries as $country)
                    {{ $country->name }}@if(!$loop->last),@endif
                @endforeach
            </td>
            <td class="px-1 py-1 text-sm dark:text-gray-200">
                @foreach($staff->departments as $department)
                    {{ $department->name ." - " . $department->country->name  }}@if(!$loop->last),@endif
                @endforeach
            </td>
            <td class="px-1 py-1 text-sm space-x-4 dark:text-gray-200">
                <x-table.actions id="{{ $staff->id }}" updateModal="true"/>
            </td>
        </tr>
        @endforeach
    </x-slot>

    <x-slot name="links">
        {{ $allStaff->links() }}
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
                    Livewire.emit('deleteStaff', id);
                }
            })
        };
        </script>
    </x-slot>
</x-table.layout>
