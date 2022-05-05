<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="desktop-computer"/>
	</x-slot>

	<x-slot name="header">
		Create Variety Field
	</x-slot>

	<x-slot name="fields">
        <x-forms.variety-dropdown
        :identifier="'create_variety'"
        :label="'Variety'"
        :id="'create_variety'"
        :name="'create_variety'"
        wire:model.defer="variety"
    />

    <x-forms.field-dropdown
    :identifier="'create_field'"
    :label="'Field'"
    :id="'create_field'"
    :name="'create_field'"
    wire:model.defer="field"
/>

        <x-forms.date
			label="Plant Date"
			id="start_date"
			placeholder="Plant Date"
			wire:model.defer="start_date"
		/>
        <x-forms.date
        label="Expected Harvest Date"
        id="end_date"
        placeholder="Expected Harvest Date"
        wire:model.defer="end_date"
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
