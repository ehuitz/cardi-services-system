<x-filters.dropdown :attributes="$attributes">
   <x-slot name="label">
      Origin
   </x-slot>

   @foreach($origins as $origin)
      <option value="{{ $origin->id }}">{{ $origin->intro_name. ' - '. $origin->country->name }}</option>
   @endforeach
</x-filters.dropdown>
