<div class="py-4 pl-6 pr-6 w-50 bg-gray-100 dark:bg-gray-700 flex-shrink-0 rounded-2xl w-full ">

    {{-- Request Details --}}

    <div class="flex flex-col mt-4 w-full px-4 rounded-lg">

        <div class="flex gap-2 mb-2">
            <div class="h-10 w-10 rounded-full overflow-hidden">
                <img src="{{ asset($ticket->author->path) }}" alt="Avatar" class="h-full w-full" />
            </div>
            <div class="text-md font-semibold mt-2 dark:text-gray-200">{{ $author->name }}</div>
        </div>


        <div class="flex text-sm text-black dark:text-gray-300">

            <span>

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </span>
            {{ $ticket->name }}


        </div>

        <div class="flex text-sm text-black dark:text-gray-300">

            <span>


                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </span>
            {{ $ticket->position }}


        </div>
        <div class="flex text-black dark:text-gray-300 text-sm"> <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
            </svg>{{ $author->email }}</div>

        <div class="flex text-black dark:text-gray-300 text-sm"><svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>{{ $ticket->phone }}</div>

        <div class="flex mt-2 text-black dark:text-gray-300 font-medium text-sm">{{ $ticket->type }}</div>
        <div class="flex mt-2 text-black dark:text-gray-300 text-sm"> <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>{{ $ticket->activities }}
        </div>

        <div class="flex mt-2 text-black dark:text-gray-300 text-sm">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>

            <span>Quotation required:</span> <span class="ml-5 font-semibold"> {{ $ticket->quotation }}</span>
        </div>



    </div>



    {{-- Request Files --}}


    <h2 class="mt-10 text-center font-semibold dark:text-gray-200">Files</h2>

    <div id="accordion-color" data-accordion="collapse" class="mt-2">
        <h2 id="accordion-color-heading-1">
            <button type="button"
                class="flex justify-between items-center p-5 w-full font-medium text-left border border-b-0 border-gray-200 bg-white"
                data-accordion-target="#accordion-color-body-1" aria-expanded="false"
                aria-controls="accordion-color-body-1">
                <span class="font-semibold">Quotations</span>
                <span
                    class="flex items-center justify-center bg-gray-300 text-xs
                        dark:bg-gray-600 dark:text-gray-200 font-medium h-5 w-5 rounded-full">
                    {{ count($quotations) }}
                </span>
                <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">

            <div class="p-5 border border-b-0 border-gray-200">
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-1 sm:px-6">

                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                            @if (count($quotations))
                                @foreach ($quotations as $quotation)
                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                        <div class="w-0 flex-1 flex items-center">
                                            <!-- Heroicon name: solid/paper-clip -->
                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-2 flex-1 w-0 truncate">{{ $quotation['name'] }} </span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <a href="{{ asset($quotation['path']) }}"
                                                class="font-medium text-indigo-600 hover:text-indigo-500"
                                                target="_blank"> View </a>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">No quotations files
                                    available</li>
                            @endif
                        </ul>
                    </dd>
                </div>
            </div>

        </div>
        <h2 id="accordion-color-heading-2">
            <button type="button"
                class="flex justify-between items-center p-5 w-full font-medium text-left border border-b-0 border-gray-200 bg-white "
                data-accordion-target="#accordion-color-body-2" aria-expanded="false"
                aria-controls="accordion-color-body-2">
                <span class="font-semibold">Contracts</span>
                <span
                    class="flex items-center justify-center bg-gray-300 text-xs
                    dark:bg-gray-600 dark:text-gray-200 font-medium h-5 w-5 rounded-full">
                    {{ count($contracts) }}
                </span>
                <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
            <div class="p-5 border border-b-0 border-gray-200">
                <div class="p-5 border border-b-0 border-gray-200">
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-1 sm:px-6">

                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                @if (count($contracts))
                                    @foreach ($contracts as $contract)
                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                            <div class="w-0 flex-1 flex items-center">
                                                <!-- Heroicon name: solid/paper-clip -->
                                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span class="ml-2 flex-1 w-0 truncate">{{ $contract['name'] }}
                                                </span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <a href="{{ asset($contract['path']) }}"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500"
                                                    target="_blank"> View </a>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">No contracts
                                        files
                                        available</li>
                                @endif
                            </ul>
                        </dd>
                    </div>
                </div>
            </div>
        </div>
        <h2 id="accordion-color-heading-3">
            <button type="button"
                class="flex justify-between items-center p-5 w-full font-medium text-left border border-b-0 border-gray-200 focus:ring-4  bg-white"
                data-accordion-target="#accordion-color-body-3" aria-expanded="false"
                aria-controls="accordion-color-body-3">
                <span class="font-semibold">Receipts</span>
                <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
            <div class="p-5 border border-t-0 border-gray-200">

            </div>
        </div>
    </div>
    <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ route('files.store') }}">
        @csrf
        <h2 class="text-gray-800 dark:text-gray-200 mt-5 text-center">Upload a File</h2>
        <div class="col-span-6 sm:col-span-3">
            <label for="type" class="block text-md text-gray-700 dark:text-gray-200">File Type</label>
            <select id="type" name="type" autocomplete="type-name"
                class="mb-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-200 sm:text-sm">
                <option>Quotation</option>
                <option>Contract</option>
                <option>Receipt</option>
            </select>
        </div>
        <div>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                        aria-hidden="true">
                        <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex justify-center text-sm text-gray-600">
                        <input type="text" value="{{ $ticket->id }}" class="hidden" name="ticket_id">
                        <label for="file"
                            class="relative cursor-pointer bg-white rounded-md font-medium text-gray-800 dark:text-gray-200 dark:bg-gray-800">
                            <span>Upload a file</span>
                            <input id="file" name="file" type="file" class="">
                        </label>

                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-300">CSV, TXT, PDF, PNG, JPEG, XLSX up to 20MB</p>
                </div>
            </div>
            @error('file')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 dark:bg-gray-700">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm
            font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2
            focus:ring-indigo-500">Upload</button>
        </div>
    </form>


    {{-- Recent Requests --}}

    {{-- <div class="flex flex-col mt-8">
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


    </div> --}}

</div>
