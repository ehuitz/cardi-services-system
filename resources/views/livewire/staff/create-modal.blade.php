<x-modal wire:model="show" createModal="true">
	<x-slot name="icon">
		<x-icons.icon name="identification"/>
	</x-slot>

	<x-slot name="header">
		Create Staff
	</x-slot>

	<x-slot name="fields">
		<x-forms.input
			label="Email"
			id="create_email"
			placeholder="Email address"
			type="email"
			wire:model.defer="email"
       />
		<x-forms.category-select
			:identifier="'create_category'"
			:label="'Assigned Categories'"
			:name="'create_category'"
			:val="''"
			wire:model.defer="category"
		/>
		<x-forms.country-select
			:identifier="'create_country'"
			:label="'Assigned Countries'"
			:name="'create_country'"
			:val="''"
			wire:model.defer="country"
		/>
        <x-forms.department-select
			:identifier="'create_department'"
			:label="'Assigned Departments'"
			:name="'create_department'"
			:val="''"
			wire:model.defer="department"
		/>
		<input
			type="hidden"
			id="staff_id"
			value=""
		/>
	</x-slot>

	<x-slot name="buttonText">
		Create
	</x-slot>
</x-modal>
