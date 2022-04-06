<x-modal wire:model="show" updateModal="true">
	<x-slot name="icon">
		<x-icons.icon name="desktop-computer"/>
	</x-slot>

	<x-slot name="header">
		Edit Field Equipment
	</x-slot>

	<x-slot name="fields">
		<x-forms.input
			label="Asset Tag"
			id="edit_asset_tag"
			placeholder="Asset Tag"
			wire:model.defer="assetTag"
		/>

        <x-forms.date
            label="Date Acquired"
            id="acquired_at"
            placeholder="Date Acquired"
            wire:model.defer="acquired_at"
        />

        <x-forms.input
			label="Model No"
			id="create_model_no"
			placeholder="Model No"
			wire:model.defer="model_no"
		/>

        <x-forms.project-dropdown
        :identifier="'create_project'"
        :label="'Project Funded By'"
        :id="'create_project'"
        :name="'create_project'"
        wire:model.defer="project"
    />

		<x-forms.department-dropdown
			:identifier="'edit_department'"
			:label="'Department'"
			:id="'edit_department'"
			:name="'edit_department'"
			wire:model.defer="department"
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
