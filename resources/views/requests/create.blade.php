<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <span class="ml-6">Request for Services</span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-6">
        <x-forms.ticket :categories="$categories" />
    </div>
</x-app-layout>
