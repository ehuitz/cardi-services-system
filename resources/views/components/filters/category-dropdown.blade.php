<x-filters.dropdown :attributes="$attributes">
   <x-slot name="label">
      Request Type
   </x-slot>

   @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
   @endforeach
</x-filters.dropdown>
