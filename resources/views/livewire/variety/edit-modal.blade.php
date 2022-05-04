<x-modal wire:model="show" updateModal="true">
    <x-slot name="icon">
        <x-icons.icon name="field" />
    </x-slot>

    <x-slot name="header">
        Edit Variety
    </x-slot>

    <x-slot name="fields">

        <x-forms.hidden :label="'ID'" :id="'edit_id'" placeholder="ID" wire:model.defer="oid" />

        <x-forms.input label="Variety Name" id="edit_name" placeholder="name" wire:model.defer="name" />

        <x-forms.crop-dropdown
			:identifier="'edit_crop'"
			:label="'Crop'"
			:id="'edit_crop'"
			:name="'edit_crop'"
			wire:model.defer="crop"
		/>
            <x-forms.origin-dropdown
			:identifier="'edit_origin'"
			:label="'Origin'"
			:id="'edit_origin'"
			:name="'edit_origin'"
			wire:model.defer="origin"
		/>
        <x-forms.seed-type
        :identifier="'create_type'"
        :name="'create_type'"
        id="create_type"
        wire:model.defer="type"/>

        <x-forms.input label="Description" id="edit_description" placeholder="Description" wire:model.defer="description" />

        <x-forms.input
        label="Possible Usage"
        id="edit_use"
        placeholder="Possible Usage"
        wire:model.defer="use"
    />
    </x-slot>

    <x-slot name="buttonText">
        Update
    </x-slot>
</x-modal>
