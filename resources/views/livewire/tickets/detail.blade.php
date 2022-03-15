<x-slot name="header">

	<div class="flex items-center">

		@if(auth()->user()->is_staff())
		<x-buttons.back link="{{ route('tickets.index') }}"/>
		@else
		<x-buttons.back link="{{ route('requests.index') }}"/>
		@endif

		<span class="ml-6 text-green-500">{{ $ticket->title }}</span>
	</div>

</x-slot>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-6 ml-3 mr-3 md:mr-0">

	@if(request()->user()->is_staff())
	<div class="flex items-end mb-2">
		<div class="flex space-x-2">
			<x-filters.status-dropdown wire:model="status"/>
			<x-filters.category-dropdown wire:model="category"/>
			<x-filters.country-dropdown wire:model="country"/>
            <x-filters.department-dropdown wire:model="department"/>
		</div>

		<label class="block text-xs text-center ml-4">
			<span class="text-gray-500 dark:text-gray-400 mb-4">
				Assigned
			</span>

			<div class="flex -space-x-2 items-center justify-center mt-1.5">
				@foreach($ticket->staff as $staff)
				<img class="inline-block h-8 w-8 rounded-full
					ring-2 ring-gray-200 dark:ring-gray-600"
					src="https://i.pravatar.cc/100?u={{ $staff->user->id }}" alt="{{ $staff->user->name }}">
				@endforeach

                <span class="flex items-center justify-center text-md
                dark:text-gray-200 font-medium h-6 w-6 rounded-full"
            >

                <x-ticket.edit-staff-modal>
                    <x-slot name="trigger">
                        <div class="text-green-500 dark:text-green-400 hover:text-green-600
                        dark:hover:text-green-500 cursor-pointer ml-6">
                            <x-icons.icon name="edit"/>
                        </div>
                    </x-slot>
                </x-ticket.edit-staff-modal>


            </span>
			</div>


            {{-- @php
            if(request()->ticket->staff->count())
                $num = 12 + request()->ticket->staff->count() + 12;
            else
                $num = 6;
        @endphp --}}
		</label>
	</div>
	@endif

	@livewire('tickets.chat', ['ticketId' => $ticket->id])

</div>
