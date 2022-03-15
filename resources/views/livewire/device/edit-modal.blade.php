<x-modal wire:model="show" updateModal="true">
	<x-slot name="icon">
		<x-icons.icon name="desktop-computer"/>
	</x-slot>

	<x-slot name="header">
		Edit Device
	</x-slot>

	<x-slot name="fields">
		<x-forms.input
			label="Asset Tag"
			id="edit_asset_tag"
			placeholder="Asset Tag"
			wire:model.defer="assetTag"
		/>
		<x-forms.model-dropdown
			:identifier="'edit_model'"
			:label="'Model'"
			:id="'edit_model'"
			:name="'edit_model'"
			wire:model.defer="deviceModel"
		/>
		<x-forms.country-dropdown
			:identifier="'edit_country'"
			:label="'Country'"
			:id="'edit_country'"
			:name="'edit_country'"
			wire:model.defer="country"
		/>
		<x-forms.input
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
		/>
	</x-slot>

	<x-slot name="buttonText">
		Update
	</x-slot>
</x-modal>
