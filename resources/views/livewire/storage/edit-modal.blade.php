<x-modal wire:model="show" editModal="true">
    <x-slot name="icon">
        <x-icons.icon name="annotation" />
    </x-slot>

    <x-slot name="header">
        Edit Storage
    </x-slot>

    <x-slot name="fields">
        <x-forms.input label="Number" id="edit_number" placeholder="Number" wire:model.defer="number" />
        <x-forms.storage-type :identifier="'edit_type'" :name="'edit_type'" id="edit_type" wire:model.defer="type" />
        <x-forms.input label="Capacity" id="edit_capacity" placeholder="Capacity" wire:model.defer="capacity" />
        <x-forms.input label="Units" id="edit_capacity_units" placeholder="Units" wire:model.defer="capacity_units" />
        <x-forms.repository-type :identifier="'edit_repository'" :name="'edit_repository'" id="edit_repository"
            wire:model.defer="repository" />

        <x-forms.department-dropdown :identifier="'edit_department'" :label="'Department'" :id="'edit_department'" :name="'edit_department'"
            wire:model.defer="department" />

    </x-slot>

    <x-slot name="buttonText">
        Update
    </x-slot>
</x-modal>
