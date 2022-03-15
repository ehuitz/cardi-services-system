<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="desktop-computer"/>
	</x-slot>

	<x-slot name="header">
		Create Department
	</x-slot>

	<x-slot name="fields">
		<x-forms.input
			label="Name"
			id="create_name"
			placeholder="Name"
			wire:model.defer="name"
		/>
		{{-- <x-forms.model-dropdown
			:identifier="'create_model'"
			:label="'Model'"
			:id="'create_model'"
			:name="'create_model'"
			wire:model.defer="deviceModel"
		/> --}}
		<x-forms.country-dropdown
			:identifier="'create_country'"
			:label="'Country'"
			:id="'create_country'"
			:name="'create_country'"
			wire:model.defer="country"
		/>
		{{-- <x-forms.input
			label="Serial Number"
			id="create_serial_number"
			placeholder="Serial Number"
			wire:model.defer="serialNumber"
		/>
		<x-forms.input
			label="MAC Address"
			id="create_mac_address"
			placeholder="MAC Address"
			wire:model.defer="macAddress"
		/> --}}
	</x-slot>

	<x-slot name="buttonText">
		Create
	</x-slot>
</x-modal>
