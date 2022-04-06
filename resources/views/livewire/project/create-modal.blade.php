<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="desktop-computer"/>
	</x-slot>

	<x-slot name="header">
		Create Project
	</x-slot>

	<x-slot name="fields">



		<x-forms.input
			label="Name"
			id="create_name"
			placeholder="Name"
			wire:model.defer="name"
		/>
        <x-forms.input
			label="Code"
			id="create_code"
			placeholder="Code"
			wire:model.defer="code"
		/>

       

		<x-forms.country-all-dropdown
			:identifier="'create_country'"
			:label="'Country'"
			:id="'create_country'"
			:name="'create_country'"
			wire:model.defer="country"
		/>

        <x-forms.input
			label="Type"
			id="create_type"
			placeholder="Type"
			wire:model.defer="type"
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
