@section('title', 'Variety ')
<x-slot name="header">

    <div class="flex items-center">

        @if (auth()->user()->is_staff())
            <x-buttons.back link="{{ route('varieties.index') }}" />
        @endif

        <span class="ml-6 text-green-500">{{ 'Variety ' . $variety->name }}</span>
    </div>

</x-slot>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-6 ml-3 mr-3 md:mr-0">





            @livewire('variety.author')


</div>

