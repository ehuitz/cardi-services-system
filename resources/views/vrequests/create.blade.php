@section('title', 'Request Time Off')
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <span class="ml-6">Request Time Off</span>
        </div>

        <div class="flex gap-2 justify-center mt-3">
            <div class="p-4 w-1/3 text-center bg-green-300 rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700 ">
                <h5 class="mb-4 text-lg font-medium text-gray-500 dark:text-gray-400">Available Vacation Days</h5>
                <div class="text-gray-900 text-center dark:text-white">
                    <span class="text-2xl font-semibold"></span>
                    <span class="text-2xl font-extrabold tracking-tight">45</span>
                    <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">day(s)</span>
                </div>
            </div>

            <div class="p-4 w-1/3 text-center bg-blue-300 rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700 ">
                <h5 class="mb-4 text-lg font-medium text-gray-500 dark:text-gray-400">Available Sick Days</h5>
                <div class="text-gray-900 text-center dark:text-white">
                    <span class="text-2xl font-semibold"></span>
                    <span class="text-2xl font-extrabold tracking-tight">16</span>
                    <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">day(s)</span>
                </div>
            </div>

            <div class="p-4 w-1/3 text-center bg-red-300 rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700 ">
                <h5 class="mb-4 text-lg font-medium text-gray-500 dark:text-gray-400">Available Casual Days</h5>
                <div class="text-gray-900 text-center dark:text-white">
                    <span class="text-2xl font-semibold"></span>
                    <span class="text-2xl font-extrabold tracking-tight">5</span>
                    <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">day(s)</span>
                </div>
            </div>
        </div>



    </x-slot>



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-6">
        <x-forms.vrequest />
    </div>
</x-app-layout>
