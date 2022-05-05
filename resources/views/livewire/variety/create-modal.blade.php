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

        <x-forms.crop-dropdown
			:identifier="'create_crop'"
			:label="'Crop'"
			:id="'create_crop'"
			:name="'create_crop'"
			wire:model.defer="crop"
		/>

		<x-forms.origin-dropdown
			:identifier="'create_origin'"
			:label="'Origin'"
			:id="'create_origin'"
			:name="'create_origin'"
			wire:model.defer="origin"
		/>

        <x-forms.variety-dropdown
			:identifier="'create_variety'"
			:label="'Variety'"
			:id="'create_variety'"
			:name="'create_variety'"
			wire:model.defer="variety"
		/>
        <x-forms.seed-type
        :identifier="'create_type'"
        :name="'create_type'"
        id="create_type"
        wire:model.defer="type"/>

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
