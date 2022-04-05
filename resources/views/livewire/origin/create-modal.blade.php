<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="block"/>
	</x-slot>

	<x-slot name="header">
		Create Origin
	</x-slot>

	<x-slot name="fields">


        <x-forms.input
			label="Institution"
			id="create_institution"
			placeholder="Institution"
			wire:model.defer="institution"
		/>

		<x-forms.country-dropdown
			:identifier="'create_country'"
			:label="'Country'"
			:id="'create_country'"
			:name="'create_country'"
			wire:model.defer="country"
		/>
        <x-forms.input
			label="Location"
			id="create_location"
			placeholder="Location"
			wire:model.defer="location"
		/>
        <x-forms.input
			label="Introductory Name"
			id="create_intro_name"
			placeholder="Introductory Name"
			wire:model.defer="intro_name"
		/>
        <x-forms.input
			label="Belize Name"
			id="create_belizean_name"
			placeholder="Belize Name"
			wire:model.defer="belizean_name"
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
