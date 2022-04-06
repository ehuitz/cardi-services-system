<x-filters.dropdown :attributes="$attributes">
   <x-slot name="label">
      Block
   </x-slot>

   @foreach($blocks as $block)
      <option value="{{ $block->id }}">{{ $block->location. ' - '. $block->country->name }}</option>
   @endforeach
</x-filters.dropdown>
