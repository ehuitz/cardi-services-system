<x-modal wire:model="show" editModal="true">
	<x-slot name="icon">
		<x-icons.icon name="annotation"/>
	</x-slot>

	<x-slot name="header">
		Edit Permission
	</x-slot>

	<x-slot name="fields">
		<x-forms.input label="Title" id="edit_title" placeholder="Title" wire:model.defer="title"/>
	</x-slot>

	<x-slot name="buttonText">
		Update
	</x-slot>
</x-modal>
