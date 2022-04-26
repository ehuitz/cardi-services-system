<?php

namespace App\Http\Livewire\Department;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $name = '';
    // public $deviceModel = '';
    public $country = '';
    // public $serialNumber = '';
    // public $macAddress = '';

    protected $listeners = [
        'createDepartmentErrorBag' => 'createDepartmentErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createDepartment', [
            'name' => $this->name,
            'country_id' => $this->country,
        ]);
    }

    public function createDepartmentErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->name = '';
        $this->country = '';
    }

    public function render()
    {
        return view('livewire.department.create-modal');
    }
}
