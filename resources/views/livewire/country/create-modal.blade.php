<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="country"/>
	</x-slot>

	<x-slot name="header">
		Create Country
	</x-slot>

	<x-slot name="fields">
		<x-forms.input label="Name" id="create_name" placeholder="Name" wire:model.defer="name"/>

        <x-forms.input label="Code" id="create_code" placeholder="Code" wire:model.defer="code"/>
	</x-slot>



	<x-slot name="buttonText">
		Create
	</x-slot>
</x-modal>
