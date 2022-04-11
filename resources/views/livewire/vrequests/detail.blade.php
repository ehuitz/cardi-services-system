<x-slot name="header">

    <div class="flex items-center">

        @if (auth()->user()->is_staff())
            <x-buttons.back link="{{ route('vrequests.index') }}" />
        @endif

        <span class="ml-6 text-green-500">{{ 'Vacation Request ' . $vrequest->staff->user->name }}</span>
    </div>

</x-slot>

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8 pb-6 ml-3 mr-3 md:mr-0">

    @if (request()->user()->is_staff())
        <div class="flex items-end mb-2">
            <div class="flex space-x-2">
                <x-filters.status-dropdown wire:model="status" />
            </div>


        </div>
    @endif



            @livewire('vrequests.author')


</div>

