<x-modal wire:model="show" updateModal="true">
	<x-slot name="icon">
		<x-icons.icon name="desktop-computer"/>
	</x-slot>

	<x-slot name="header">
		Edit Variety Field
	</x-slot>

	<x-slot name="fields">
        <x-forms.variety-dropdown
        :identifier="'edit_variety'"
        :label="'Variety'"
        :id="'edit_variety'"
        :name="'edit_variety'"
        wire:model.defer="variety"
    />

    <x-forms.field-dropdown
    :identifier="'edit_field'"
    :label="'Field'"
    :id="'edit_field'"
    :name="'edit_field'"
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
			id="edit_description"
			placeholder="Description"
			wire:model.defer="description"
		/>
	</x-slot>

	<x-slot name="buttonText">
		Update
	</x-slot>
</x-modal>
