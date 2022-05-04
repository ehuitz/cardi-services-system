@props(['categories', 'quotations'])
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{ route('requests.store') }}" method="POST">
        @csrf
        <x-forms.input label="Request Title:" placeholder="Enter a Title for your request" id="subject" />
        <x-forms.select label="Service Required:" :items="$categories" id="category"/>
        {{-- <x-forms.select label="Country" :items="$countries" id="country"/> --}}
        <x-forms.textarea label="Please explain your request in detail:" placeholder="Details of Service Request" id="content" />

        <x-forms.no-select/>

        <div class="mt-4">
            <x-forms.button label="Submit Request"/>
        </div>
    </form>
</div>
