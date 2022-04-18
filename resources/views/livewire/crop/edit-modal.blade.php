<x-modal wire:model="show" editModal="true">
	<x-slot name="icon">
		<x-icons.icon name="annotation"/>
	</x-slot>

	<x-slot name="header">
		Edit Crop
	</x-slot>

	<x-slot name="fields">
		<x-forms.input label="Common Name" id="edit_name" placeholder="Name" wire:model.defer="name"/>
        <x-forms.input label="Scientific Name" id="edit_scientific_name" placeholder="Scientific Name" wire:model.defer="scientific_name"/>
        <x-forms.input label="Possible Use" id="edit_use" placeholder="Possible Use" wire:model.defer="use"/>
        <x-forms.input label="Type" id="edit_type" placeholder="Type" wire:model.defer="type"/>


	</x-slot>

	<x-slot name="buttonText">
		Update
	</x-slot>
</x-modal>
