<div class="py-4 text-gray-500 dark:text-gray-400">
    <img class="ml-20" src="/img/cardi-logo.png" alt="cardi-logo" width="50">
    <a
        class="ml-10 text-lg font-bold text-gray-800 dark:text-gray-200"
        href="#"
    >
        Services System
    </a>
    <ul class="mt-6">
        @if (auth()->user()->is_staff())
            <x-nav.side-nav-link title="Requests" icon="ticket"
                active="{{ request()->routeIs('tickets.index') }}"
                link="{{ route('tickets.index') }}"
            />
            <x-nav.side-nav-link title="Vacation Requests" icon="clock"
            active="{{ request()->routeIs('vrequests.index') }}"
            link="{{ route('vrequests.index') }}"
        />
            <x-nav.inventory/>

            @can('seed_access')
            <x-nav.seeds/>
            @endcan
            <x-nav.management/>

            <x-nav.side-nav-link title="Charts" icon="ticket"
            active="{{ request()->routeIs('chartjs.index') }}"
            link="{{ route('chartjs.index') }}"
        />

            <div class="px-6 my-6">
                <a href="{{ route('vrequests.create') }}"
                    class="flex items-center justify-between px-4 py-2
                        text-xs font-medium leading-5 text-white transition-colors
                        duration-150 bg-green-600 border border-transparent rounded-lg
                        active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                >
                    Request Vacation
                    <span class="ml-2" aria-hidden="true">+</span>
                </a>
            </div>


        @else

        <x-nav.side-nav-link title="My Requests" icon="ticket"
            active="{{ request()->routeIs('requests.index') }}"
            link="{{ route('requests.index') }}"
        />


        @endif
    </ul>



    <div class="px-6 my-6">
        <a href="{{ route('requests.create') }}"
            class="flex items-center justify-between px-4 py-2
                text-xs font-medium leading-5 text-white transition-colors
                duration-150 bg-blue-600 border border-transparent rounded-lg
                active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
        >
            Create Request
            <span class="ml-2" aria-hidden="true">+</span>
        </a>
    </div>
</div>
