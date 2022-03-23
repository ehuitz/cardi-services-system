@props(['categories', 'countries'])
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{ route('requests.store') }}" method="POST">
        @csrf
        <x-forms.input label="Subject" placeholder="Enter a Subject" id="subject" />
        <x-forms.select label="Category" :items="$categories" id="category"/>
        <x-forms.select label="Country" :items="$countries" id="country"/>
        <x-forms.textarea label="Message" placeholder="What seems to be the issue?" id="content" />
        <div class="mt-4">
            <x-forms.button label="Submit Request"/>
        </div>
    </form>
</div>
