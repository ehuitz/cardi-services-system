<label class="block mt-4 text-sm">
    <span class="text-gray-800 font-semibold dark:text-gray-300">
        Would you like to request a quotation?
    </span>
    <select class="block w-full mt-1  text-gray-500 text-sm dark:text-gray-300 dark:border-gray-600
            dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray border px-4 py-2 rounded-lg border-gray-200
            @error("quotation") border-red-500 dark:border-red-400 @enderror"
            id="quotation"
            name="quotation" >
            <option value="0" selected disabled>Select if a quotation is needed</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>

    </select>

    @error("quotation")
        <span class="text-xs text-red-600 dark:text-red-400">
            {{ $message }}
        </span>
    @enderror
</label>
