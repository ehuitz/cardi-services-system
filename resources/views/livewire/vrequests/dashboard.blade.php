@section('title', 'Vacation Requests')

<x-slot name="header">
    @if (request()->user()->is_staff())
        Vaction Requests
    @else
        Vaction Requests
    @endif
</x-slot>

<div class="max-w-7xl sm:px-6 lg:px-8 pb-6">
    <div class="mb-2 md:flex md:flex-inline items-end justify-between">
        <div class="md:mb-0 md:mt-0 mb-4 mt-4 md:w-1/3">
            <x-forms.search-input wire:model.debounce.500ms="search" placeholder="Search..." />
        </div>
    </div>

    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left
                        text-gray-400 uppercase border-b dark:border-gray-700
                        bg-gray-50 dark:text-gray-500 dark:bg-gray-800">
                        <th class="px-4 py-3">Staff</th>
                        <th class="px-4 py-3">Days Requested</th>
                        <th class="px-4 py-3">Department Assigned</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($vrequests as $vrequest)
                        <tr class="text-gray-700 dark:text-gray-400 cursor-pointer hover:bg-gray-200
                        dark:hover:bg-gray-600"
                            @if (request()->route()->named('vrequests.index')) onclick="window.location='{{ route('vrequests.show', $vrequest->id) }}';"
                        @else
                        onclick="window.location='{{ route('vrequests.show', $vrequest->id) }}';" @endif>


                            <td class="px-4 py-3 text-xs dark:text-gray-200">
                                <p class="line-clamp-1">
                                    {{ $vrequest->staff->user->name ?? 'Unknown' }}
                                </p>
                            </td>


                            <td class="px-4 py-3 text-xs dark:text-gray-200">
                                <p class="line-clamp-1">
                                    {{ $vrequest->days . ' day(s)' ?? '' }}
                                </p>
                            </td>

                            <td class="px-1 py-1 text-xs dark:text-gray-200">
                                @foreach ($vrequest->staff->departments as $department)
                                    {{ $department->name }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>

                            <td class="px-1 py-1 text-xs dark:text-gray-200">
                                <p class="line-clamp-1">
                                    {{ 'Approved' }}
                                </p>
                            </td>

                            <td class="px-4 py-3 text-xs dark:text-gray-200">
                                {{ $vrequest->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (!$vrequests->count())
            <tr>
                <p class="dark:text-gray-300 text-center mt-4 font-medium
                    text-gray-600">There are
                    currently no Vacation Requests .</p>
            </tr>
        @endif
    </div>
    {{ $vrequests->links() }}
</div>
