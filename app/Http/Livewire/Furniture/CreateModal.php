<?php

namespace App\Http\Livewire\Furniture;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $assetTag = '';
    public $acquired_at = '';
    public $model_no = '';
    public $project = '';
    public $department = '';
    public $serialNumber = '';
    public $macAddress = '';

    protected $listeners = [
        'createFurnitureErrorBag' => 'createFurnitureErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createFurniture', [
            'asset_tag' => $this->assetTag,
            'acquired_at' => $this->acquired_at,
            'model_no' => $this->model_no,
            'department_id' => $this->department,
            'project_id' => $this->project,
            'serial_number' => $this->serialNumber,
            'mac_address'=> $this->macAddress
        ]);
    }

    public function createFurnitureErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->assetTag = '';
        $this->acquired_at = '';
        $this->model_no = '';
        $this->department = '';
        $this->project = '';
        $this->serialNumber = '';
        $this->macAddress = '';
    }

    public function render()
    {
        return view('livewire.furniture.create-modal');
    }
}
