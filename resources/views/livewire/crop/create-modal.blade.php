<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="seed"/>
	</x-slot>

	<x-slot name="header">
		Create Crop
	</x-slot>

	<x-slot name="fields">
		<x-forms.input label="Name" id="create_name" placeholder="Name" wire:model.defer="name"/>

        <x-forms.input label="Scientific Name" id="create_scientific_name" placeholder="Scientific Name" wire:model.defer="scientific_name"/>

        <x-forms.input label="Possible Use" id="create_use" placeholder="Possible Use" wire:model.defer="use"/>

        <x-forms.input label="Seed Type" id="create_type" placeholder="Seed Type" wire:model.defer="type"/>
	</x-slot>



	<x-slot name="buttonText">
		Create
	</x-slot>
</x-modal>
