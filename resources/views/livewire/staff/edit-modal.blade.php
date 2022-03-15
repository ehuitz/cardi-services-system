<x-modal wire:model="show" editModal="true">
	<x-slot name="icon">
		<x-icons.icon name="identification"/>
	</x-slot>

	<x-slot name="header">
		Edit Staff Details
	</x-slot>

	<x-slot name="fields">
		<x-forms.category-select :identifier="'edit_category'" :label="'Assigned Categories'"
			:name="'edit_category'" :val="''" wire:model.defer="category"
		/>
		<x-forms.country-select :identifier="'edit_country'" :label="'Assigned Countries'"
			:name="'edit_country'" :val="''" wire:model.defer="country"
		/>
        <x-forms.department-select :identifier="'edit_department'" :label="'Assigned Departments'"
			:name="'edit_department'" :val="''" wire:model.defer="department"
		/>
		<input type="hidden" id="staff_id" value=""/>
	</x-slot>

	<x-slot name="buttonText">
		Update
	</x-slot>
</x-modal>
