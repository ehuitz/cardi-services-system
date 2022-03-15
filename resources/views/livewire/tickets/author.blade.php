<div class="flex mt-4 md:mt-0 justify-end">

    @if (auth()->user()->is_staff())
    <div class="py-4 pl-6 pr-6 w-50 bg-gray-100
    dark:bg-gray-700 flex-shrink-0 rounded-2xl w-full">
        <div class="flex flex-col items-center mt-4 w-full px-4 rounded-lg">
            <div class="h-20 w-20 rounded-full overflow-hidden">
                <img src="https://i.pravatar.cc/100?u={{ $author->id }}"
                    alt="Avatar"
                    class="h-full w-full"
                />
            </div>
            <div class="text-sm font-semibold mt-2 dark:text-gray-200">{{ $author->name }}</div>
            <div class="text-xs text-gray-500 dark:text-gray-300">{{ $author->email }}</div>
        </div>
        <div class="flex flex-col mt-8">
            <div class="flex flex-row items-center justify-between">
                <span class="font-bold dark:text-gray-200 text-sm">Recent Tickets</span>
                <span class="flex items-center justify-center bg-gray-300 text-xs
                    dark:bg-gray-600 dark:text-gray-200 font-medium h-5 w-5 rounded-full"
                >
                    {{ count($recentTickets) }}
                </span>
            </div>
            @if (count($recentTickets))
            <div class="flex flex-col space-y-1 mt-4 -mx-2 h-36 overflow-y-auto">
                @foreach($recentTickets as $ticket)
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
</div>
