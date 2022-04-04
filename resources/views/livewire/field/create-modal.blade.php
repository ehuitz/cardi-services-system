<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="field"/>
	</x-slot>

	<x-slot name="header">
		Create Field
	</x-slot>

	<x-slot name="fields">
		<x-forms.input
			label="Field Name"
			id="create_name"
			placeholder="Field Name"
			wire:model.defer="name"
		/>

		<x-forms.block-dropdown
			:identifier="'create_block'"
			:label="'Block'"
			:id="'create_block'"
			:name="'create_block'"
			wire:model.defer="block"
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
