<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{ route('vrequests.store') }}" method="POST">
        @csrf
        <x-forms.input label="Days" placeholder="Enter number of days" id="days" />
        <x-forms.date label="Date From" placeholder="Enter Vacation Start Date" id="date_start" />
        <x-forms.date label="Date To" placeholder="Enter Vacation End Date" id="date_end" />

        <x-forms.textarea label="Notes" placeholder="Notes of Vacation Request" id="notes" />
        <div class="mt-4">
            <x-forms.button label="Submit Vacation Request"/>
        </div>
    </form>
</div>
