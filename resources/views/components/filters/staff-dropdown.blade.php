<x-filters.dropdown :attributes="$attributes">
	<x-slot name="label">
		Assigned
	</x-slot>

	{{-- <x-slot name="default">
		All
	</x-slot> --}}

	@foreach($staff as $staff)
		<option value="{{ $staff->id }}">{{ $staff->user->name }}</option>
	@endforeach
</x-filters.dropdown>
