@props(['message'])
<div class="col-start-6 col-end-13 p-3 rounded-lg">
    <div class="flex items-center justify-start flex-row-reverse">
        <div class="flex items-center justify-center
            h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
        >
            <img class="object-cover rounded-full"
                src=""
                />
        </div>
        <div class="relative mr-3 text-sm bg-green-200 dark:bg-green-500
            dark:text-gray-100 py-2 px-4 shadow rounded-xl min-w-65 md:min-w-60">
            <div>
                {{ $message['content'] }}
            </div>
            <div class="absolute text-xs bottom-0 right-0 -mb-5 mr-2 text-gray-500">
                {{ $message['created_at'] }} {{ $message['author_id']}}


            </div>
        </div>
    </div>
</div>
