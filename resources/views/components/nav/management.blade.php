<li class="relative px-6 py-3">
    <button
        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors
        duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        @click="toggleManagementMenu" aria-haspopup="true">
        <span class="inline-flex items-center">
            <x-icons.icon name="settings" />
            <span class="ml-4">Management</span>
        </span>
        <x-icons.icon name="dropdown" />
    </button>
    <template x-if="isManagementMenuOpen">
        <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner
            bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
            x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0"
            x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300"
            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
            aria-label="submenu">
            <x-nav.management-link title="Users" link="{{ route('users.index') }}"
                active="{{ request()->routeIs('users.index') }}" />
            <x-nav.management-link title="Staff" link="{{ route('staff.index') }}"
                active="{{ request()->routeIs('staff.index') }}" />
            <x-nav.management-link title="Permissions" link="{{ route('permissions.index') }}"
                active="{{ request()->routeIs('permissions.index') }}" />
            <x-nav.management-link title="Roles" link="{{ route('roles.index') }}"
                active="{{ request()->routeIs('roles.index') }}" />
            <x-nav.management-link title="Departments" link="{{ route('departments.index') }}"
                active="{{ request()->routeIs('departments.index') }}" />
            <x-nav.management-link title="Countries" link="{{ route('countries.index') }}"
                active="{{ request()->routeIs('countries.index') }}" />
            <x-nav.management-link title="Services" link="{{ route('categories.index') }}"
                active="{{ request()->routeIs('categories.index') }}" />
            <x-nav.management-link title="Status" link="{{ route('status.index') }}"
                active="{{ request()->routeIs('status.index') }}" />
            <x-nav.management-link title="Projects" link="{{ route('projects.index') }}"
                active="{{ request()->routeIs('projects.index') }}" />
            <x-nav.management-link title="Company Types" link="{{ route('types.index') }}"
                active="{{ request()->routeIs('types.index') }}" />
        </ul>
    </template>
</li>
