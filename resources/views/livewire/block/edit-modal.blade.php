<x-modal wire:model="show" updateModal="true">
    <x-slot name="icon">
        <x-icons.icon name="block" />
    </x-slot>

    <x-slot name="header">
        Edit Block
    </x-slot>

    <x-slot name="fields">

        <x-forms.hidden :label="'ID'" :id="'edit_id'" placeholder="ID" wire:model.defer="oid" />

        <x-forms.input label="Location" id="edit_location" placeholder="Location" wire:model.defer="location" />

        <x-forms.country-dropdown :identifier="'edit_country'" :label="'Country'" :id="'edit_country'"
            :name="'edit_country'" wire:model.defer="country" />

        <x-forms.input label="Area (acres)" id="edit_area" placeholder="Area" wire:model.defer="area" />

        <x-forms.input label="Description" id="edit_description" placeholder="Description" wire:model.defer="description" />
    </x-slot>

    <x-slot name="buttonText">
        Update
    </x-slot>
</x-modal>
