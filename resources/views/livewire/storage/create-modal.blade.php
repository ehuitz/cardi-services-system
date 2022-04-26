<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="country"/>
	</x-slot>

	<x-slot name="header">
		Create Storage
	</x-slot>

	<x-slot name="fields">
		<x-forms.input label="Number" id="create_number" placeholder="Number" wire:model.defer="number"/>

        <x-forms.input label="Type" id="create_type" placeholder="Type" wire:model.defer="type"/>
	</x-slot>



	<x-slot name="buttonText">
		Create
	</x-slot>
</x-modal>
