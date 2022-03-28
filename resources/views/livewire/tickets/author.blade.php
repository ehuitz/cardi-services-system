<div class="py-4 pl-6 pr-6 w-50 bg-gray-100 dark:bg-gray-700 flex-shrink-0 rounded-2xl w-full">

    {{-- Request Details --}}

    <div class="flex flex-col mt-4 w-full px-4 rounded-lg">

        <div class='flex items-center justify-center'>
            <div class="h-20 w-20 rounded-full overflow-hidden">
                <img src="https://i.pravatar.cc/100?u={{ $author->id }}" alt="Avatar" class="h-full w-full" />
            </div>

        </div>
        <div class="text-m font-semibold mt-2 dark:text-gray-200 text-center">{{ $author->name }}</div>

        <div class="flex text-md text-black dark:text-gray-300">

            <span>

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </span>
            {{ $ticket->name }}


        </div>

        <div class="flex text-md text-black dark:text-gray-300">

            <span>


                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </span>
            {{ $ticket->position }}


        </div>
        <div class="flex text-black dark:text-gray-300"> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
            </svg>{{ $author->email }}</div>

        <div class="flex text-black dark:text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>{{ $ticket->phone }}</div>

        <div class="flex mt-2 text-black dark:text-gray-300 font-medium">{{ $ticket->type }}</div>
        <div class="flex mt-2 text-black dark:text-gray-300"> <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>{{ $ticket->activities }}
        </div>
    </div>

    {{-- Recent Requests --}}

    <div class="flex flex-col mt-8">
        <div class="flex flex-row items-center justify-between">
            <span class="font-bold dark:text-gray-200 text-sm">Recent Requests</span>
            <span
                class="flex items-center justify-center bg-gray-300 text-xs
                    dark:bg-gray-600 dark:text-gray-200 font-medium h-5 w-5 rounded-full">
                {{ count($recentTickets) }}
            </span>
        </div>
        @if (count($recentTickets))
            <div class="flex flex-col space-y-1 mt-4 -mx-2 h-36 overflow-y-auto">
                @foreach ($recentTickets as $ticket)
                    <a class="flex flex-row items-center hover:bg-gray-200
                    dark:hover:bg-gray-500 dark:hover:text-gray-700
                    rounded-xl p-2 cursor-pointer"
                        href="{{ route('tickets.show', $ticket['id']) }}">
                        <div class="ml-2 text-sm font-semibold dark:text-gray-200">
                            <p class="line-clamp-1">{{ $ticket['title'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="ml-2 mt-2 text-sm font-medium dark:text-gray-400">No other requests</p>
        @endif


    </div>


    {{-- Request Files --}}




    <div id="accordion-color" data-accordion="collapse" class="mt-10">
        <h2 id="accordion-color-heading-1">
            <button type="button"
                class="flex justify-between items-center p-5 w-full font-medium text-left rounded-t-xl border border-b-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 hover:bg-blue-100 dark:hover:bg-gray-800 bg-blue-100 dark:bg-gray-800"
                data-accordion-target="#accordion-color-body-1" aria-expanded="false"
                aria-controls="accordion-color-body-1">
                <span>Quotation</span>
                <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">

            </div>
        </div>
        <h2 id="accordion-color-heading-2">
            <button type="button"
                class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800"
                data-accordion-target="#accordion-color-body-2" aria-expanded="false"
                aria-controls="accordion-color-body-2">
                <span>Contract</span>
                <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">

            </div>
        </div>
        <h2 id="accordion-color-heading-3">
            <button type="button"
                class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800"
                data-accordion-target="#accordion-color-body-3" aria-expanded="false"
                aria-controls="accordion-color-body-3">
                <span>Receipts</span>
                <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">

            </div>
        </div>
    </div>



</div>
