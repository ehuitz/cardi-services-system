<x-modal wire:model="show" updateModal="true">
    <x-slot name="icon">
        <x-icons.icon name="block" />
    </x-slot>

    <x-slot name="header">
        Edit Origin
    </x-slot>

    <x-slot name="fields">

        <x-forms.hidden :label="'ID'" :id="'edit_id'" placeholder="ID" wire:model.defer="oid" />

        <x-forms.input label="Institution" id="edit_location" placeholder="Institution" wire:model.defer="institution" />

        <x-forms.country-dropdown :identifier="'edit_country'" :label="'Country'" :id="'edit_country'"
            :name="'edit_country'" wire:model.defer="country" />

        <x-forms.input label="Location" id="edit_location" placeholder="Location" wire:model.defer="location" />

        <x-forms.input label="Introductory Name" id="edit_intro_name" placeholder="Introductory Name" wire:model.defer="intro_name" />
        <x-forms.input label="Belize Name" id="edit_belizean_name" placeholder="Belize Name" wire:model.defer="belizean_name" />
        <x-forms.input label="Description" id="edit_description" placeholder="Description" wire:model.defer="description" />
    </x-slot>

    <x-slot name="buttonText">
        Update
    </x-slot>
</x-modal>
