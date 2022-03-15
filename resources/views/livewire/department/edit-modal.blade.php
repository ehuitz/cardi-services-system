<x-modal wire:model="show" updateModal="true">
	<x-slot name="icon">
		<x-icons.icon name="desktop-computer"/>
	</x-slot>

	<x-slot name="header">
		Edit Department
	</x-slot>

	<x-slot name="fields">

        		<x-forms.input
			:label="'ID'"
			:id="'edit_id'"
			placeholder="ID"
			wire:model.defer="oid"
		/>

		<x-forms.input
			label="Name"
			id="edit_name"
			placeholder="Name"
			wire:model.defer="name"
		/>
		{{-- <x-forms.model-dropdown
			:identifier="'edit_model'"
			:label="'Model'"
			:id="'edit_model'"
			:name="'edit_model'"
			wire:model.defer="deviceModel"
		/> --}}
		<x-forms.country-dropdown
			:identifier="'edit_country'"
			:label="'Country'"
			:id="'edit_country'"
			:name="'edit_country'"
			wire:model.defer="country"
		/>
		{{-- <x-forms.input
			label="Serial Number"
			id="edit_serial_number"
			placeholder="Serial Number"
			wire:model.defer="serialNumber"
		/>
		<x-forms.input
			label="MAC Address"
			id="edit_mac_address"
			placeholder="MAC Address"
			wire:model.defer="macAddress"
		/> --}}
	</x-slot>

	<x-slot name="buttonText">
		Update
	</x-slot>
</x-modal>
