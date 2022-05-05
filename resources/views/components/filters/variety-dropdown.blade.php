<x-filters.dropdown :attributes="$attributes">
   <x-slot name="label">
      Variety
   </x-slot>

   @foreach($varieties as $variety)
      <option value="{{ $variety->id }}">{{ $variety->name. ' - '. $variety->origin->institution . ' '. $variety->origin->country->name }}</option>
   @endforeach
</x-filters.dropdown>
