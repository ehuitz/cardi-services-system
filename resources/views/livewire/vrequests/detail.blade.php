<x-slot name="header">

    <div class="flex items-center">

        @if (auth()->user()->is_staff())
            <x-buttons.back link="{{ route('vrequests.index') }}" />
        @endif

        <span
            class="ml-6 text-green-500 text-md">{{ 'Vacation Request ' .$vrequest->staff->user->name .' - ' .date('j F, Y', strtotime($vrequest->date_start)) .' to ' .date('j F, Y', strtotime($vrequest->date_end)) }}</span>
    </div>

    <div class="flex gap-2 items-place-right">

        {{-- Department/Unit Head Approve --}}
        @can('department_unit_head_approve')
        <form wire:submit.prevent="approveUnit">
            <button type="submit"
                class="px-3 py-2 text-xs font-medium text-center text-white bg-green-400 rounded-lg
           hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600
           dark:hover:bg-green-400 dark:focus:ring-green-800">
                Approve
            </button>
        </form>

        <form wire:submit.prevent="declineUnit">
            <button type="submit"
                class="px-3 py-2 text-xs font-medium text-center text-white bg-red-400 rounded-lg
           hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600
           dark:hover:bg-red-400 dark:focus:ring-red-800">
                Decline
            </button>
        </form>
        @endcan
        {{-- Manager Approve --}}
        @can('manager_approve')
            <button type="button"
                class="px-3 py-2 text-xs font-medium text-center text-white bg-green-400 rounded-lg
           hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600
           dark:hover:bg-green-400 dark:focus:ring-green-800">
                Approve
            </button>
        @endcan

        {{-- Executive Approve --}}
        @can('executive_approve')
            <button type="button"
                class="px-3 py-2 text-xs font-medium text-center text-white bg-green-400 rounded-lg
           hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600
           dark:hover:bg-green-400 dark:focus:ring-green-800">
                Approve
            </button>
        @endcan

    </div>

</x-slot>



<div class="max-w-6xl mx-auto sm:px-6 lg:px-8 pb-6 ml-3 mr-3 md:mr-0">




    @livewire('vrequests.author')


</div>
