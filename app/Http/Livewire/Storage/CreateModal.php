<?php

namespace App\Http\Livewire\Storage;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $number = '';
    public $type = '';
    public $capacity_units = '';
    public $capacity = '';
    public $repository = '';
    public $department = '';

    protected $listeners = [
        'createStorageErrorBag' => 'createStorageErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createStorage', [
            'number' => $this->number,
            'type' => $this->type,
            'capacity_units' => $this->capacity_units,
            'capacity' => $this->capacity,
            'repository' => $this->repository,
            'department_id' => $this->department,



        ]);
    }

    public function createStorageErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->number = '';
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
