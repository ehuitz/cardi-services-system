@section('title', 'Register')

<x-guest-layout>
    <x-breeze.auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="/img/cardi-logo.png" alt="cardi-logo">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-breeze.auth-validation-errors class="mb-4" :errors="$errors" />


        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h3 class="text-lg font-medium leading-6 text-gray-900">Register - CARDI Services System</h3>
            <p class="mt-1 text-sm text-gray-600">This information will be displayed internally only. Information can not be changed after this.</p>
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-8 gap-6">
                        <!-- Name -->
                        <div class="md:col-span-4 sm:col-span-8">
                            <x-breeze.label for="name" :value="__('Full Name')" />

                            <x-breeze.input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" autofocus />
                        </div>


                        <!-- Email Address -->
                        <div class="md:col-span-4 sm:col-span-8">
                            <x-breeze.label for="email" :value="__('Email')" />

                            <x-breeze.input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')"/>
                        </div>

                        <div class="md:col-span-8 sm:col-span-8">
                            <x-forms.register :countries="$countries" />
                        </div>


                        <div class="md:col-span-8 sm:col-span-8">
                            <x-breeze.label for="phone" :value="__('Phone')" />

                            <x-breeze.input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                :value="old('phone')" />
                        </div>

                        <div class="md:col-span-4 sm:col-span-8">
                            <x-breeze.label for="position" :value="__('Position')" />

                            <x-breeze.input id="position" class="block mt-1 w-full" type="text" name="position"
                                :value="old('position')" />
                        </div>
                        <div class="md:col-span-4 sm:col-span-8">
                            <x-breeze.label for="company_name" :value="__('Company Name')" />

                            <x-breeze.input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                                :value="old('company_name')" />
                        </div>

                        <div class="md:col-span-4 sm:col-span-8">
                            <div class="md:col-span-8 sm:col-span-8">
                                <x-forms.company :types="$types" />
                            </div>
                        </div>

                        <div class="md:col-span-4 sm:col-span-8">
                            <div class="md:col-span-8 sm:col-span-8">
                                <x-forms.active :activities="$activities" />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="md:col-span-8 sm:col-span-8">
                            <x-breeze.label for="password" :value="__('Password')" />

                            <x-breeze.input id="password" class="block mt-1 w-full" type="password" name="password"
                                autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="md:col-span-8 sm:col-span-8">
                            <x-breeze.label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-breeze.input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" />
                        </div>

                        <div class="md:col-span-8 sm:col-span-8 flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900
                    dark:text-gray-300 dark:hover:text-gray-500"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-breeze.button class="ml-4">
                                {{ __('Register') }}
                            </x-breeze.button>
                        </div>

                    </div>
                </div>

        </form>
    </div>
    </x-breeze.auth-card>
</x-guest-layout>
