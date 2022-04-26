<?php

namespace App\Http\Livewire\Storage;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $name = '';
    public $code = '';

    protected $listeners = [
        'createStorageErrorBag' => 'createStorageErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createStorage', [
            'name' => $this->name,
            'type' => $this->type,
            'capacity_units' => $this->capacity_units,
            'capacity' => $this->capacity,
            'repository' => $this->repository,
            'department' => $this->department,



        ]);
    }

    public function createStorageErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->name = '';
        $this->type = '';
        $this->capacity_units = '';
        $this->capacity = '';
        $this->repository = '';
        $this->department = '';
    }

    public function render()
    {
        return view('livewire.storage.create-modal');
    }
}
