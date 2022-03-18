
        @if (auth()->user()->is_staff())
            <div class="py-4 pl-6 pr-6 w-50 bg-gray-100
    dark:bg-gray-700 flex-shrink-0 rounded-2xl w-full">
                <div class="flex flex-col mt-4 w-full px-4 rounded-lg">

                    <div class='flex items-center justify-center'>
                        <div class="h-20 w-20 rounded-full overflow-hidden">
                            <img src="https://i.pravatar.cc/100?u={{ $author->id }}" alt="Avatar" class="h-full w-full" />
                        </div>

                      </div>
                      <div class="text-m font-semibold mt-2 dark:text-gray-200 text-center">{{ $author->name }}</div>

                    <div class="flex text-md text-black dark:text-gray-300">

                        <span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                          </svg>
                    </span>
                        {{ $ticket->name }}


                    </div>

                    <div class="flex text-md text-black dark:text-gray-300">

                        <span>


                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                              </svg>
                    </span>
                          {{ $ticket->position }}


                    </div>
                    <div class="flex text-black dark:text-gray-300"> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                      </svg>{{ $author->email }}</div>

                    <div class="flex text-black dark:text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                      </svg>{{ $ticket->phone }}</div>

                    <div class="flex mt-2 text-black dark:text-gray-300 font-medium">{{ $ticket->type }}</div>
                    <div class="flex mt-2 text-black dark:text-gray-300"> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                      </svg>{{ $ticket->activities }}
                    </div>
                </div>
                <div class="flex flex-col mt-8">
                    <div class="flex flex-row items-center justify-between">
                        <span class="font-bold dark:text-gray-200 text-sm">Recent Tickets</span>
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
                        <p class="ml-2 mt-2 text-sm font-medium dark:text-gray-400">No other tickets</p>
                    @endif
                </div>
            </div>
        @endif

