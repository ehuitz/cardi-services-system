<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="desktop-computer"/>
	</x-slot>

	<x-slot name="header">
		Create Block
	</x-slot>

	<x-slot name="fields">
		<x-forms.input
			label="Location"
			id="create_location"
			placeholder="Location"
			wire:model.defer="location"
		/>

		<x-forms.country-all-dropdown
			:identifier="'create_country'"
			:label="'Country'"
			:id="'create_country'"
			:name="'create_country'"
			wire:model.defer="country"
		/>
        <x-forms.input
			label="Area (acres)"
			id="create_area"
			placeholder="Area"
			wire:model.defer="area"
		/>
        <x-forms.input
			label="Description"
			id="create_description"
			placeholder="Description"
			wire:model.defer="description"
		/>
	</x-slot>

	<x-slot name="buttonText">
		Create
	</x-slot>
</x-modal>
