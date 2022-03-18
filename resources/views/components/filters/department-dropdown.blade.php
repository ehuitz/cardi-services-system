<x-filters.dropdown :attributes="$attributes">
   <x-slot name="label">
      Assigned
   </x-slot>

   @foreach($departments as $department)
      <option value="{{ $department->id }}">{{ $department->name }}</option>
   @endforeach
</x-filters.dropdown>
