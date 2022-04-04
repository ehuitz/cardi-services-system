<x-modal wire:model="show" updateModal="true">
    <x-slot name="icon">
        <x-icons.icon name="field" />
    </x-slot>

    <x-slot name="header">
        Edit field
    </x-slot>

    <x-slot name="fields">

        <x-forms.hidden :label="'ID'" :id="'edit_id'" placeholder="ID" wire:model.defer="oid" />

        <x-forms.input label="name" id="edit_name" placeholder="name" wire:model.defer="name" />

        <x-forms.block-dropdown :identifier="'edit_block'" :label="'Block'" :id="'edit_block'"
            :name="'edit_block'" wire:model.defer="block" />

        <x-forms.input label="Area (acres)" id="edit_area" placeholder="Area" wire:model.defer="area" />

        <x-forms.input label="Description" id="edit_description" placeholder="Description" wire:model.defer="description" />
    </x-slot>

    <x-slot name="buttonText">
        Update
    </x-slot>
</x-modal>
