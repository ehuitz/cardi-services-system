<li class="relative">
    <button class="inline-flex mt-3 justify-between w-full text-sm font-semibold transition-colors
        duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        @click="toggleStorageManagementMenu"
        aria-haspopup="true"
    >
        <span class="inline-flex items-center">

            <span class="ml-4">Storage</span>
        </span>
        <x-icons.icon name="dropdown"/>
    </button>
    <template x-if="isStorageManagementMenuOpen">
        <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md
            bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
            x-transition:enter="transition-all ease-in-out duration-300"
            x-transition:enter-start="opacity-25 max-h-0"
            x-transition:enter-end="opacity-100 max-h-xl"
            x-transition:leave="transition-all ease-in-out duration-300"
            x-transition:leave-start="opacity-100 max-h-xl"
            x-transition:leave-end="opacity-0 max-h-0"
            aria-label="submenu"
        >
            <x-nav.sub-management-link title="Storages"
                link="{{ route('storages.index') }}"
                active="{{ request()->routeIs('storages.index') }}"
            />

            {{-- <x-nav.sub-management-link title="Blocks"
                link="{{ route('blocks.index') }}"
                active="{{ request()->routeIs('blocks.index') }}"
            /> --}}

        </ul>
    </template>
</li>
