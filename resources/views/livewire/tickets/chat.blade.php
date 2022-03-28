@if (request()->user()->is_staff())
    <div class="flex md:flex-row flex-col antialiased text-gray-800">
        <div class="md:w-3/5 overflow-x-hidden max-h-96 sm:w-full">
            <div class="flex flex-col flex-auto pr-0 md:pr-4">
                <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 dark:bg-gray-700 h-full">
                    <div
                        class="flex flex-col flex-col-reverse h-full overflow-x-auto overflow-y-scroll mb-4 p-4 min-h-100 max-h-100
                    scrollbar scrollbar-thumb-green-300 scrollbar-track-gray-200
                    dark:scrollbar-thumb-green-500 dark:scrollbar-track-gray-600">
                        <div class="flex flex-col-reverse h-full">
                            <div class="grid grid-cols-12 gap-y-2">
                                @foreach ($allMessages as $message)
                                    @if ($message['author_id'] == auth()->user()->id)
                                        <x-ticket.right-chat :message="$message" />
                                    @else
                                        <x-ticket.left-chat :message="$message" />
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <form wire:submit.prevent="sendMessage"
                        class="flex flex-row items-center bg-gray-200
                    dark:bg-gray-800 w-full px-4 py-4 rounded-b-2xl">
                        <div class="flex-grow ml-2">
                            <div class="relative w-full">
                                <input wire:model="message" type="text" id="message_content" name="message_content"
                                    class="flex w-full border dark:border-gray-700 rounded-xl
                                focus:outline-none dark:bg-gray-600 dark:text-gray-100
                                focus:border-green-300 pl-4 h-10 border-gray-300
                                dark:focus:border-green-600 dark:placeholder-gray-400
                                @error('message') border-red-500 dark:border-red-400 @enderror"
                                    placeholder="Send a message..." />
                            </div>
                        </div>
                        <div class="ml-4">
                            <button
                                class="flex items-center justify-center bg-green-500 dark:bg-green-600
                            hover:bg-green-600 rounded-xl text-white px-4 py-1 flex-shrink-0
                            dark:hover:bg-green-700"
                                type="submit">
                                <span>Send</span>
                                <span class="ml-2">
                                    <x-icons.icon name="message" />
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="md:w-2/5 overflow-x-hidden min-h-200 sm:w-full">

            @livewire('tickets.author')

        </div>
    @else
        <div class="flex md:flex-row flex-col antialiased text-gray-800">
            <div class="md:w-3/5 overflow-x-hidden max-h-96 sm:w-full">
                <div class="flex flex-col flex-auto pr-0 md:pr-4">
                    <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 dark:bg-gray-700 h-full">
                        <div
                            class="flex flex-col flex-col-reverse h-full overflow-x-auto overflow-y-scroll mb-4 p-4 min-h-100 max-h-100
                        scrollbar scrollbar-thumb-green-300 scrollbar-track-gray-200
                        dark:scrollbar-thumb-green-500 dark:scrollbar-track-gray-600">
                            <div class="flex flex-col-reverse h-full">
                                <div class="grid grid-cols-12 gap-y-2">
                                    @foreach ($allMessages as $message)
                                        @if ($message['author_id'] == auth()->user()->id)
                                            <x-ticket.right-chat :message="$message" />
                                        @else
                                            <x-ticket.left-chat :message="$message" />
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <form wire:submit.prevent="sendMessage"
                            class="flex flex-row items-center bg-gray-200
                        dark:bg-gray-800 w-full px-4 py-4 rounded-b-2xl">
                            <div class="flex-grow ml-2">
                                <div class="relative w-full">
                                    <input wire:model="message" type="text" id="message_content" name="message_content"
                                        class="flex w-full border dark:border-gray-700 rounded-xl
                                    focus:outline-none dark:bg-gray-600 dark:text-gray-100
                                    focus:border-green-300 pl-4 h-10 border-gray-300
                                    dark:focus:border-green-600 dark:placeholder-gray-400
                                    @error('message') border-red-500 dark:border-red-400 @enderror"
                                        placeholder="Send a message..." />
                                </div>
                            </div>
                            <div class="ml-4">
                                <button
                                    class="flex items-center justify-center bg-green-500 dark:bg-green-600
                                hover:bg-green-600 rounded-xl text-white px-4 py-1 flex-shrink-0
                                dark:hover:bg-green-700"
                                    type="submit">
                                    <span>Send</span>
                                    <span class="ml-2">
                                        <x-icons.icon name="message" />
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="md:w-2/5 overflow-x-hidden max-h-96 sm:w-full overflow-x-auto overflow-y-scroll">

                @livewire('tickets.author')

            </div>
        </div>

@endif

</div>
