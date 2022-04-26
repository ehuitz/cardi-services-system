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

        <x-forms.input label="Capacity" id="create_capacity" placeholder="Capacity" wire:model.defer="capacity"/>

        <x-forms.input label="Capacity Units" id="create_capacity_units" placeholder="Capacity Units" wire:model.defer="capacity_units"/>

        <x-forms.input label="Repository" id="create_repository" placeholder="Repository" wire:model.defer="repository"/>

        <x-forms.department-dropdown
        :identifier="'create_department'"
        :label="'Department'"
        :id="'create_department'"
        :name="'create_department'"
        wire:model.defer="department"
    />
	</x-slot>



	<x-slot name="buttonText">
		Create
	</x-slot>
</x-modal>
