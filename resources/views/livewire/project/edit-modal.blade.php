<x-modal wire:model="show" updateModal="true">
    <x-slot name="icon">
        <x-icons.icon name="desktop-computer" />
    </x-slot>

    <x-slot name="header">
        Edit Project
    </x-slot>

    <x-slot name="fields">

        <x-forms.input :label="'ID'" :id="'edit_id'" placeholder="ID" wire:model.defer="oid" />

        <x-forms.input label="Name" id="edit_name" placeholder="Name" wire:model.defer="name" />
        <x-forms.input label="Code" id="edit_code" placeholder="Code" wire:model.defer="code" />

        <x-forms.country-all-dropdown :identifier="'edit_country'" :label="'Country'" :id="'edit_country'"
            :name="'edit_country'" wire:model.defer="country" />
        <x-forms.input label="Type" id="edit_type" placeholder="Type" wire:model.defer="type" />
        <x-forms.input label="Description" id="edit_description" placeholder="Description" wire:model.defer="description" />


    </x-slot>

    <x-slot name="buttonText">
        Update
    </x-slot>
</x-modal>
