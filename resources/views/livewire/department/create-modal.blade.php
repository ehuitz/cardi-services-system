<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="desktop-computer"/>
	</x-slot>

	<x-slot name="header">
		Create Department
	</x-slot>

	<x-slot name="fields">
		<x-forms.input
			label="Name"
			id="create_name"
			placeholder="Name"
			wire:model.defer="name"
		/>

		<x-forms.country-all-dropdown
			:identifier="'create_country'"
			:label="'Country'"
			:id="'create_country'"
			:name="'create_country'"
			wire:model.defer="country"
		/>
	</x-slot>

	<x-slot name="buttonText">
		Create
	</x-slot>
</x-modal>
