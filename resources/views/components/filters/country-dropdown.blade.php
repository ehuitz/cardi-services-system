<x-filters.dropdown :attributes="$attributes">
   <x-slot name="label">
      Country
   </x-slot>

   @foreach($countries as $country)
      <option value="{{ $country->id }}">{{ $country->name }}</option>
   @endforeach
</x-filters.dropdown>
