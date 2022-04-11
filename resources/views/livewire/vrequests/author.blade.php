<div class="flex md:flex-row flex-col antialiased text-gray-800 gap-2">


    <div class="md:w-3/5 overflow-x-hidden min-h-200 sm:w-full mt-3">

        <div class="py-4 pl-6 pr-6 w-50 bg-gray-100 dark:bg-gray-700 flex-shrink-0 rounded-2xl w-full ">

            {{-- Request Details --}}

            <div class="flex flex-col mt-4 w-full px-4 rounded-lg">

                <div class="flex gap-2 mb-2">
                    <div class="h-10 w-10 rounded-full overflow-hidden">
                        <img src="https://i.pravatar.cc/100?u={{ $vrequest->staff_id }}" alt="Avatar"
                            class="h-full w-full" />
                    </div>
                    <div class="text-md font-semibold mt-2 dark:text-gray-200">{{ $vrequest->staff->user->name }}</div>


                </div>

                <h2 class="mt-3 font-bold text-black dark:text-gray-300">Annual Leave Application Details</h3>

                    <div class="flex text-md text-black dark:text-gray-300 mt-2 gap-4">

                        <span>

                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                        {{ $vrequest->days . ' day(s)' }}


                    </div>

                    <div class="flex text-md text-black dark:text-gray-300 mt-3">

                        <span>


                            <svg class="w-6 h-6 mr-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </span>
                        From: {{ date('d-M-Y', strtotime($vrequest->date_start)) }}


                    </div>

                    <div class="flex text-md text-black dark:text-gray-300 mt-1 mb-3">

                        <span>

                            <svg class="w-6 h-6 mr-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </span>
                        To: {{ date('d-M-Y', strtotime($vrequest->date_end)) }}


                    </div>



                    <hr>

                    <h3 class="mt-3 font-bold text-black dark:text-gray-300">Contact Information</h3>

                    <div class="flex mt-2 text-black dark:text-gray-300 text-md mt-3 mb-2">
                        <svg class="w-6 h-6 mr-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $vrequest->staff->user->country->name }}
                    </div>
                    <div class="flex text-black dark:text-gray-300 text-md mb-2"><svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>{{ $vrequest->staff->user->phone }}</div>


                    <div class="flex text-black dark:text-gray-300 text-md mb-4"> <svg
                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>{{ $vrequest->staff->user->email }}</div>

                    <hr>

                    <div class="flex flex-col mt-2 w-full px-4 rounded-lg">

                        <h1 class="mt-3 font-bold text-black dark:text-gray-300">For Human Resource Official Use</h1>

                        <div class="flex text-md text-black dark:text-gray-300 mt-2 gap-4">

                            <span>

                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                            Eligibility per year: <b> {{ $vrequest->year_eligible . ' day(s)' }} </b>


                        </div>

                        <div class="flex text-md text-black dark:text-gray-300 mt-2 gap-4">

                            <span>

                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                            Balance brought forward: <b> {{ $vrequest->brought_forward . ' day(s)' }} </b>


                        </div>

                        <div class="flex text-md text-black dark:text-gray-300 mt-2 gap-4">

                            <span>

                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                            Amount Previously taken: <b> {{ $vrequest->previously_taken . ' day(s)' }} </b>


                        </div>

                        <div class="flex text-md text-black dark:text-gray-300 mt-2 gap-4">

                            <span>

                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                            Current Eligibility: <b> {{ $vrequest->current_eligible . ' day(s)' }} </b>


                        </div>
                        <div class="flex text-md text-black dark:text-gray-300 mt-2  mb-2 gap-4">

                            <span>

                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                            Balance Carried Forward: <b> {{ $vrequest->balance_forward . ' day(s)' }} </b>


                        </div>





                    </div>
            </div>
        </div>



    </div>



    <div class="md:w-2/5 overflow-x-hidden min-h-200 sm:w-full mt-3">

        <div class="py-4 pl-6 pr-6 w-50 bg-gray-100 dark:bg-gray-700 flex-shrink-0 rounded-2xl w-full ">

            {{-- Requests Approvals --}}

            <h1 class="mt-3 font-bold text-black dark:text-gray-300">For completion by Manager/ Head of Unit/ CARDI
                Representative</h1>

            <div class="flex text-md text-black dark:text-gray-300 mt-2 gap-4">




            </div>

            <h1 class="mt-3 font-bold text-black dark:text-gray-300">Approval:</h1>

            <div class="text-md text-black dark:text-gray-300 mt-2 gap-4 text-sm">
                <span>
                    <p class="mt-3 font-medium text-black dark:text-gray-300">Department/Unit Head <span
                            class="bg-green-700 text-white text-sm font-semibold inline-flex items-center p-1.5 rounded-full dark:bg-green-700 dark:text-white">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span></p>

                </span>
                <span>
                    <p class="mt-3 font-medium text-black dark:text-gray-300">Manager <span
                            class="bg-green-700 text-white text-sm font-semibold inline-flex items-center p-1.5 rounded-full dark:bg-green-700 dark:text-white">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span></p>

                </span>
                <span>
                    <p class="mt-3 font-medium text-black dark:text-gray-300">Executive Director <span
                            class="bg-green-700 text-white text-sm font-semibold inline-flex items-center p-1.5 rounded-full dark:bg-green-700 dark:text-white">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span></p>

                </span>




            </div>

            <ol class="relative border-l border-gray-500 dark:border-gray-200 mt-6">
                <li class="mb-10 ml-4 ">
                    <div
                        class="absolute w-3 h-3 bg-gray-500 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-200 dark:bg-gray-300">
                    </div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-800 dark:text-gray-300">6 April
                        2022 2:55 PM</time>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-200">Department/Unit Head Approved
                    </p>
                </li>
                <li class="mb-10 ml-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-500 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-200 dark:bg-gray-300">
                    </div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-800 dark:text-gray-300">6 April
                        2022 2:59 PM</time>
                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-200">Manager Approved
                        </p>
                </li>
                <li class="ml-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-500 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-200 dark:bg-gray-300">
                    </div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-800 dark:text-gray-300"> 6 April
                        2022 3:00PM</time>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-200">Executive Director Approve</p>
                </li>
            </ol>

        </div>



    </div>
</div>
