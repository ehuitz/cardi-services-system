<x-modal wire:model="show" editModal="true">
	<x-slot name="icon">
		<x-icons.icon name="annotation"/>
	</x-slot>

	<x-slot name="header">
		Edit Storage
	</x-slot>

	<x-slot name="fields">
		<x-forms.input label="Number" id="edit_number" placeholder="Number" wire:model.defer="number"/>
        <x-forms.input label="Type" id="edit_type" placeholder="Type" wire:model.defer="type"/>
	</x-slot>

	<x-slot name="buttonText">
		Update
	</x-slot>
</x-modal>
