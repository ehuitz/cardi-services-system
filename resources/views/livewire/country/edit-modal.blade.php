<x-modal wire:model="show" editModal="true">
	<x-slot name="icon">
		<x-icons.icon name="annotation"/>
	</x-slot>

	<x-slot name="header">
		Edit Country
	</x-slot>

	<x-slot name="fields">
		<x-forms.input label="Name" id="edit_name" placeholder="Name" wire:model.defer="name"/>
        <x-forms.input label="Code" id="edit_code" placeholder="Code" wire:model.defer="code"/>
	</x-slot>

	<x-slot name="buttonText">
		Update
	</x-slot>
</x-modal>
