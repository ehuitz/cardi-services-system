<li class="relative px-6 py-3">
    <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors
        duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        @click="toggleSeedManagementMenu"
        aria-haspopup="true"
    >
        <span class="inline-flex items-center">
            <x-icons.icon name="seed"/>
            <span class="ml-4">Seed Management</span>
        </span>
        <x-icons.icon name="dropdown"/>
    </button>
    <template x-if="isSeedManagementMenuOpen">
        <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner
            bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
            x-transition:enter="transition-all ease-in-out duration-300"
            x-transition:enter-start="opacity-25 max-h-0"
            x-transition:enter-end="opacity-100 max-h-xl"
            x-transition:leave="transition-all ease-in-out duration-300"
            x-transition:leave-start="opacity-100 max-h-xl"
            x-transition:leave-end="opacity-0 max-h-0"
            aria-label="submenu"
        >
            {{-- <x-nav.management-link title="Fields"
                link="{{ route('fields.index') }}"
                active="{{ request()->routeIs('fields.index') }}"
            />

            <x-nav.management-link title="Blocks"
                link="{{ route('blocks.index') }}"
                active="{{ request()->routeIs('blocks.index') }}"
            /> --}}
            <x-nav.crops/>
            <x-nav.fields/>
            <x-nav.storages/>

        </ul>
    </template>
</li>
