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
            // 'model_id' => $this->deviceModel,
            'country_id' => $this->country,
            // 'serial_number' => $this->serialNumber,
            // 'mac_address'=> $this->macAddress
        ]);
    }

    public function createDepartmentErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->name = '';
        // $this->deviceModel = '';
        $this->country = '';
        // $this->serialNumber = '';
        // $this->macAddress = '';
    }

    public function render()
    {
        return view('livewire.department.create-modal');
    }
}
