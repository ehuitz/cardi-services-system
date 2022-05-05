@props(['id' => '', 'name' => $id,])

<label class="block mt-4 text-sm">
    <span class="text-gray-800 font-semibold dark:text-gray-300">
        Repository Type
    </span>
    <select class="block w-full mt-1  text-gray-500 text-sm dark:text-gray-300 dark:border-gray-600
            dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray border px-4 py-2 rounded-lg border-gray-200
            @error("$id") border-red-500 dark:border-red-400 @enderror"
            id="{{ $id }}"
            name="repository" {{ $attributes }} >


            <option value="" selected disabled>Select Repository Type</option>
            <option value="Tank">Tank</option>
            <option value="Bucket">Bucket</option>
            <option value="Sacks">Sacks</option>
            <option value="Small Containter">Small Containter</option>
            <option value="Other">Other</option>

    </select>

    @error("$id")
        <span class="text-xs text-red-600 dark:text-red-400">
            {{ $message }}
        </span>
    @enderror
</label>
