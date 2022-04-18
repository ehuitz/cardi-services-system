<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="field"/>
	</x-slot>

	<x-slot name="header">
		Create Variety
	</x-slot>

	<x-slot name="fields">
		<x-forms.input
			label="Variety Name"
			id="create_name"
			placeholder="Variety Name"
			wire:model.defer="name"
		/>

		<x-forms.origin-dropdown
			:identifier="'create_origin'"
			:label="'Origin'"
			:id="'create_origin'"
			:name="'create_origin'"
			wire:model.defer="origin"
		/>
        <x-forms.input
			label="Seed Type"
			id="create_type"
			placeholder="Seed Type"
			wire:model.defer="type"
		/>
        <x-forms.input
			label="Description"
			id="create_description"
			placeholder="Description"
			wire:model.defer="description"
		/>
        <x-forms.input
			label="Possible Usage"
			id="create_use"
			placeholder="Possible Usage"
			wire:model.defer="use"
		/>
	</x-slot>

	<x-slot name="buttonText">
		Create
	</x-slot>
</x-modal>
